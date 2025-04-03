<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Storage; // Import Storage Facade
use Tests\TestCase;

// Use the base TestCase provided by Laravel/PEST
uses(TestCase::class);

// Define the JSON file name and API base URL for clarity
const JSON_FILE = 'player_waste.json'; // Matches controller
const API_BASE_URL = '/api/v1/waste'; // Matches your routes/api.php

// ---- Setup ----
// This runs before each test ('it' block) in this file
beforeEach(function () {
    // Use Laravel's Storage Fake to mock the 'local' disk (where storage/app resides)
    // This prevents tests from touching the actual filesystem.
    // Each test starts with an empty virtual storage.
    Storage::fake('local');

    // We don't need to pre-create the file here because the controller's
    // getJsonData() method handles creating it if it doesn't exist.
});


// ---- Tests ----

it('can create a new player waste record', function () {
    $playerData = [
        'player_id' => 'player_test_123',
        'waste_quants' => 50.5,
        'rat_count' => 2,
    ];

    // Act: Send a POST request to the store endpoint (using API_BASE_URL)
    $response = $this->postJson(API_BASE_URL, $playerData);

    // Assertions
    $response->assertStatus(201) // Check for 'Created' HTTP status
        ->assertJsonFragment(['player_id' => 'player_test_123']) // Check if part of the data is in the response
        ->assertJsonStructure(['player_id', 'waste_quants', 'rat_count']); // Check the response structure

    // Assert that the file was actually created/written to in the *fake* storage
    Storage::disk('local')->assertExists(JSON_FILE);

    // Assert the content of the file in the fake storage
    $jsonData = Storage::disk('local')->get(JSON_FILE);
    $savedData = json_decode($jsonData, true);

    expect($savedData['players'])->toBeArray()->toHaveCount(1);
    expect($savedData['players'][0])->toMatchArray($playerData);
});

it('returns error when creating a player with duplicate id', function () {
    // Arrange: Create an initial player first in the fake storage
    $initialData = ['players' => [
        ['player_id' => 'existing_player', 'waste_quants' => 10, 'rat_count' => 1]
    ]];
    Storage::disk('local')->put(JSON_FILE, json_encode($initialData));

    // Act: Try to create a player with the same ID
    $duplicateData = [
        'player_id' => 'existing_player',
        'waste_quants' => 99,
        'rat_count' => 5,
    ];
    $response = $this->postJson(API_BASE_URL, $duplicateData);

    // Assert
    // Check your controller, it might return 400 or 409 (Conflict) - Adjust if needed
    $response->assertStatus(409) // Or 400 depending on your controller's logic
        ->assertJson(['message' => 'Player ID already exists']); // Match controller message key

    // Also assert the file content hasn't changed unexpectedly
    $jsonData = Storage::disk('local')->get(JSON_FILE);
    $savedData = json_decode($jsonData, true);
    expect($savedData['players'])->toHaveCount(1); // Still only one player
});


it('returns validation errors for invalid store data', function() {
    $invalidData = [
        'player_id' => 'invalid_data_test',
        // Missing waste_quants and rat_count
    ];
    $response = $this->postJson(API_BASE_URL, $invalidData);

    $response->assertStatus(422) // Unprocessable Entity (Laravel's validation status)
             ->assertJsonValidationErrors(['waste_quants', 'rat_count']); // Check specific fields failed
});


it('can retrieve a specific player waste record', function () {
    // Arrange: Create the file with known data in fake storage
    $playerId = 'player_to_find';
    $playerData = ['player_id' => $playerId, 'waste_quants' => 25.0, 'rat_count' => 1];
    $initialData = ['players' => [$playerData]];
    Storage::disk('local')->put(JSON_FILE, json_encode($initialData));

    // Act: Send GET request (append player ID to API_BASE_URL)
    $response = $this->getJson(API_BASE_URL . '/' . $playerId);

    // Assert
    $response->assertStatus(200)
        ->assertJson($playerData); // Check if the full player data is returned
});

it('returns 404 when retrieving a non-existent player', function () {
    // Arrange: Ensure the file is empty or doesn't contain the ID
     Storage::disk('local')->put(JSON_FILE, json_encode(['players' => []])); // Ensure file exists but is empty

    // Act
    $response = $this->getJson(API_BASE_URL . '/non_existent_player');

    // Assert
    $response->assertStatus(404);
});


it('can update an existing player waste record', function () {
    // Arrange: Create initial data
    $playerId = 'player_to_update';
    $initialPlayerData = ['player_id' => $playerId, 'waste_quants' => 100.0, 'rat_count' => 5];
    $initialData = ['players' => [$initialPlayerData]];
    Storage::disk('local')->put(JSON_FILE, json_encode($initialData));

    // Act: Send PUT request with updated data
    $updateData = ['waste_quants' => 150.5, 'rat_count' => 7];
    $response = $this->putJson(API_BASE_URL . '/' . $playerId, $updateData);

    // Assert Response
    $response->assertStatus(200)
        ->assertJsonFragment(['waste_quants' => 150.5, 'rat_count' => 7]);

    // Assert File Content
    $jsonData = Storage::disk('local')->get(JSON_FILE);
    $savedData = json_decode($jsonData, true);
    expect($savedData['players'][0]['waste_quants'])->toBe(150.5);
    expect($savedData['players'][0]['rat_count'])->toBe(7);
    expect($savedData['players'][0]['player_id'])->toBe($playerId); // Ensure ID didn't change
});

it('returns 404 when updating a non-existent player', function () {
     // Act
    $response = $this->putJson(API_BASE_URL . '/non_existent_player', ['waste_quants' => 1, 'rat_count' => 1]);

    // Assert
    $response->assertStatus(404);
});


it('can delete an existing player waste record', function () {
    // Arrange: Create initial data
    $playerIdToDelete = 'player_to_delete';
    $otherPlayerId = 'other_player';
    $initialData = ['players' => [
        ['player_id' => $playerIdToDelete, 'waste_quants' => 10.0, 'rat_count' => 1],
        ['player_id' => $otherPlayerId, 'waste_quants' => 20.0, 'rat_count' => 2],
    ]];
    Storage::disk('local')->put(JSON_FILE, json_encode($initialData));

    // Act: Send DELETE request
    $response = $this->deleteJson(API_BASE_URL . '/' . $playerIdToDelete);

    // Assert Response
    $response->assertStatus(204); // No Content

    // Assert File Content
    Storage::disk('local')->assertExists(JSON_FILE);
    $jsonData = Storage::disk('local')->get(JSON_FILE);
    $savedData = json_decode($jsonData, true);

    expect($savedData['players'])->toHaveCount(1); // Only one player should remain
    expect($savedData['players'][0]['player_id'])->toBe($otherPlayerId); // The remaining player is the correct one
});


it('returns 404 when deleting a non-existent player', function () {
    // Act
    $response = $this->deleteJson(API_BASE_URL . '/non_existent_player');

    // Assert
    $response->assertStatus(404);
});