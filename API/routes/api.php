<?php

use App\Http\Controllers\PlayerWasteController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/waste/{player_id}', [PlayerWasteController::class, 'show']);
    Route::post('/waste', [PlayerWasteController::class, 'store']);
    Route::put('/waste/{player_id}', [PlayerWasteController::class, 'update']);
    Route::delete('/waste/{player_id}', [PlayerWasteController::class, 'destroy']);
});// Commit 0: v0.0.0 - Minor feature added of Food waste - 03/23/2025 12:27:25
// Commit 1: v0.1.0 - Corrected goblin spawn logic - 03/23/2025 12:27:25
// Commit 2: v0.1.1 - Minor feature added of Food waste - 03/23/2025 12:27:26
// Commit 3: v0.2.0 - Added meat allocation route - 03/23/2025 12:27:26
