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
