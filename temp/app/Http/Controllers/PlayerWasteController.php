<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;       // Use Log facade
use Illuminate\Support\Facades\Storage;  // Use Storage facade consistently
use Illuminate\Support\Facades\Validator; // If using manual validation (optional)

class PlayerWasteController extends Controller
{
    private $jsonFileName = 'player_waste.json'; // Define filename once
    private $storageDisk = 'local';              // Define disk once (the one we fake in tests)

    /**
     * Get decoded JSON data from storage or return default structure.
     * Handles file existence and uses the Storage facade.
     */
    private function getJsonData(): array
    {
        // Use the Storage facade for checking existence on the correct disk
        if (!Storage::disk($this->storageDisk)->exists($this->jsonFileName)) {
            Log::info("File {$this->jsonFileName} not found on disk '{$this->storageDisk}', creating default.");
            // Create an empty file with the basic structure using the Storage facade
            $defaultData = ['players' => []];
            Storage::disk($this->storageDisk)->put($this->jsonFileName, json_encode($defaultData, JSON_PRETTY_PRINT));
            return $defaultData;
        }

        try {
            // Use Storage facade for getting content
            $jsonContent = Storage::disk($this->storageDisk)->get($this->jsonFileName);
            $data = json_decode($jsonContent, true);

            // Check if decoding failed or if the 'players' key is missing/not an array
            if (json_last_error() !== JSON_ERROR_NONE || !isset($data['players']) || !is_array($data['players'])) {
                Log::warning("Invalid JSON structure in {$this->jsonFileName} on disk '{$this->storageDisk}'. Resetting to default.", [
                    'json_error' => json_last_error_msg()
                ]);
                // Overwrite with default structure if corrupted
                $defaultData = ['players' => []];
                $this->saveJsonData($defaultData); // Use the save method which uses Storage::put
                return $defaultData;
            }

            return $data;

        } catch (\Exception $e) {
            Log::error("Error reading {$this->jsonFileName} from disk '{$this->storageDisk}': " . $e->getMessage());
            return ['players' => []]; // Return default structure on error
        }
    }

    /**
     * Save the provided data array to the JSON file in storage using the Storage facade.
     */
    private function saveJsonData(array $data): void
    {
        // Ensure 'players' key exists and is an array before saving
        if (!isset($data['players']) || !is_array($data['players'])) {
             Log::error("Attempted to save invalid data structure to {$this->jsonFileName}. Aborting save.", ['data' => $data]);
             // Optionally throw an exception or handle differently
             return;
        }

        $json = json_encode($data, JSON_PRETTY_PRINT);

        try {
            // Use Storage facade for writing to the correct disk
            Storage::disk($this->storageDisk)->put($this->jsonFileName, $json);
            Log::info("Successfully saved data to {$this->jsonFileName} on disk '{$this->storageDisk}'");
        } catch (\Exception $e) {
            Log::error("Error saving data to {$this->jsonFileName} on disk '{$this->storageDisk}': " . $e->getMessage());
            // Consider re-throwing or handling the error appropriately
        }
    }

    /**
     * Display the specified player waste resource.
     */
    public function show(string $player_id)
    {
        $data = $this->getJsonData();

        $player = collect($data['players'])->firstWhere('player_id', $player_id);

        if (!$player) {
            // Return standard message key for consistency maybe
            return response()->json(['message' => 'Player not found'], 404);
        }
        return response()->json($player);
    }

    /**
     * Store a newly created player waste resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'player_id' => 'required|string|max:255',
            'waste_quants' => 'required|numeric',
            'rat_count' => 'required|integer|min:0',
        ]);

        // CRITICAL: Get CURRENT data BEFORE checking for duplicates and adding
        $data = $this->getJsonData();

        if (collect($data['players'])->contains('player_id', $validated['player_id'])) {
            // Use 409 Conflict for existing resource, potentially better than 400
            return response()->json(['message' => 'Player ID already exists'], 409);
        }

        // Add the new player to the array
        $data['players'][] = $validated;

        // Save the MODIFIED data back
        $this->saveJsonData($data);

        return response()->json($validated, 201); // Return the created resource
    }

    /**
     * Update the specified player waste resource in storage.
     */
    public function update(Request $request, string $player_id)
    {
        $validated = $request->validate([
             // Use 'sometimes' rule: field must be present AND pass other rules if present at all
            'waste_quants' => 'sometimes|required|numeric',
            'rat_count' => 'sometimes|required|integer|min:0',
        ]);

        // If validation passes but $validated is empty (no valid fields sent), return error
        if (empty($validated)) {
            return response()->json(['message' => 'No valid fields provided for update.'], 400); // Bad Request
        }

        // CRITICAL: Get CURRENT data BEFORE searching and updating
        $data = $this->getJsonData();

        // Find the index of the player
        $index = collect($data['players'])->search(fn($item) => $item['player_id'] === $player_id);

        // Check if player was found
        if ($index === false) {
            return response()->json(['message' => 'Player not found'], 404);
        }

        // Merge validated update data into the existing player data
        // array_merge keeps existing keys unless overwritten by $validated
        $data['players'][$index] = array_merge($data['players'][$index], $validated);

        // Save the MODIFIED data back
        $this->saveJsonData($data);

        return response()->json($data['players'][$index]); // Return the updated resource
    }

    /**
     * Remove the specified player waste resource from storage.
     */
    public function destroy(string $player_id)
    {
        // CRITICAL: Get CURRENT data BEFORE searching and deleting
        $data = $this->getJsonData();

        // Find the index
        $index = collect($data['players'])->search(fn($item) => $item['player_id'] === $player_id);

        // Check if found
        if ($index === false) {
            return response()->json(['message' => 'Player not found'], 404);
        }

        // Remove the player from the array using splice
        array_splice($data['players'], $index, 1);

        // Save the MODIFIED data back
        $this->saveJsonData($data);

        return response()->json(null, 204); // No Content success response
    }
}