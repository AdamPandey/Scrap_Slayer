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
// Commit 4: v0.3.0 - Fixed Quants overflow in response - 03/23/2025 12:27:26
// Commit 5: v0.3.1 - Added meat allocation route - 03/23/2025 12:27:26
// Commit 6: v0.4.0 - Resolved meat allocation error - 03/23/2025 12:27:26
// Commit 7: v0.4.1 - Added meat allocation route - 03/23/2025 12:27:26
// Commit 8: v0.5.0 - Fixed gold counter mismatch - 03/23/2025 12:27:26
// Commit 9: v0.5.1 - Fixed gold counter mismatch - 03/23/2025 12:27:26
// Commit 10: v0.5.2 - Added meat allocation route - 03/23/2025 12:27:26
// Commit 11: v0.6.0 - Minor feature added of Food waste - 03/23/2025 12:27:27
// Commit 12: v0.7.0 - Fixed gold counter mismatch - 03/23/2025 12:27:27
// Commit 13: v0.7.1 - Fixed Quants overflow in response - 03/23/2025 12:27:27
// Commit 14: v0.7.2 - Corrected goblin spawn logic - 03/23/2025 12:27:27
// Commit 15: v0.7.3 - Added meat allocation route - 03/23/2025 12:27:27
// Commit 16: v0.8.0 - Added Quants tracking endpoint - 03/23/2025 12:27:27
// Commit 17: v0.9.0 - Added meat allocation route - 03/23/2025 12:27:27
// Commit 18: v0.10.0 - Added meat allocation route - 03/23/2025 12:27:27
// Commit 19: v0.11.0 - Implemented goblin spawn API - 03/23/2025 12:27:28
// Commit 20: v0.12.0 - Added meat allocation route - 03/23/2025 12:27:28
// Commit 21: v0.13.0 - Implemented goblin spawn API - 03/23/2025 12:27:28
// Commit 22: v0.14.0 - Rest API bug fixed - 03/23/2025 12:27:28
// Commit 23: v0.14.1 - Integrated gold counter endpoint - 03/23/2025 12:27:28
// Commit 24: v0.15.0 - Added meat allocation route - 03/23/2025 12:27:28
// Commit 25: v0.16.0 - Integrated gold counter endpoint - 03/23/2025 12:27:28
// Commit 26: v0.17.0 - Integrated gold counter endpoint - 03/23/2025 12:27:28
// Commit 27: v0.18.0 - Minor feature added of Food waste - 03/23/2025 12:27:29
// Commit 28: v0.19.0 - Rest API bug fixed - 03/23/2025 12:27:29
// Commit 29: v0.19.1 - Added meat allocation route - 03/23/2025 12:27:29
// Commit 30: v0.20.0 - Rest API bug fixed - 03/23/2025 12:27:29
// Commit 31: v0.20.1 - Integrated gold counter endpoint - 03/23/2025 12:27:29
// Commit 32: v0.21.0 - Corrected goblin spawn logic - 03/23/2025 12:27:29
// Commit 33: v0.21.1 - Integrated gold counter endpoint - 03/23/2025 12:27:29
// Commit 34: v0.22.0 - Resolved meat allocation error - 03/23/2025 12:27:29
// Commit 35: v0.22.1 - Resolved meat allocation error - 03/23/2025 12:27:29
// Commit 36: v0.22.2 - Corrected goblin spawn logic - 03/23/2025 12:27:30
// Commit 37: v0.22.3 - Fixed gold counter mismatch - 03/23/2025 12:27:30
// Commit 38: v0.22.4 - Minor feature added of Food waste - 03/23/2025 12:27:30
// Commit 39: v0.23.0 - Corrected goblin spawn logic - 03/23/2025 12:27:30
// Commit 40: v0.23.1 - Rest API bug fixed - 03/23/2025 12:27:30
// Commit 41: v0.23.2 - Fixed gold counter mismatch - 03/23/2025 12:27:30
// Commit 42: v0.23.3 - Added Quants tracking endpoint - 03/23/2025 12:27:30
// Commit 43: v0.24.0 - Rest API bug fixed - 03/23/2025 12:27:30
// Commit 44: v0.24.1 - Resolved meat allocation error - 03/23/2025 12:27:31
// Commit 45: v0.24.2 - Minor feature added of Food waste - 03/23/2025 12:27:31
// Commit 46: v0.25.0 - Implemented goblin spawn API - 03/23/2025 12:27:31
// Commit 47: v0.26.0 - Integrated gold counter endpoint - 03/23/2025 12:27:31
// Commit 48: v0.27.0 - Added meat allocation route - 03/23/2025 12:27:31
