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
// Commit 49: v0.28.0 - Minor feature added of Food waste - 03/23/2025 12:27:31
// Commit 50: v0.29.0 - Implemented goblin spawn API - 03/23/2025 12:27:31
// Commit 51: v0.30.0 - Corrected goblin spawn logic - 03/23/2025 12:27:31
// Commit 52: v0.30.1 - Corrected goblin spawn logic - 03/23/2025 12:27:32
// Commit 53: v0.30.2 - Added meat allocation route - 03/23/2025 12:27:32
// Commit 54: v0.31.0 - Implemented goblin spawn API - 03/23/2025 12:27:32
// Commit 55: v0.32.0 - Rest API bug fixed - 03/23/2025 12:27:32
// Commit 56: v0.32.1 - Corrected goblin spawn logic - 03/23/2025 12:27:32
// Commit 57: v0.32.2 - Resolved meat allocation error - 03/23/2025 12:27:32
// Commit 58: v0.32.3 - Minor feature added of Food waste - 03/23/2025 12:27:32
// Commit 59: v0.33.0 - Rest API bug fixed - 03/23/2025 12:27:32
// Commit 60: v0.33.1 - Added meat allocation route - 03/23/2025 12:27:32
// Commit 61: v0.34.0 - Added Quants tracking endpoint - 03/23/2025 12:27:33
// Commit 62: v0.35.0 - Fixed gold counter mismatch - 03/23/2025 12:27:33
// Commit 63: v0.35.1 - Corrected goblin spawn logic - 03/23/2025 12:27:33
// Commit 64: v0.35.2 - Fixed gold counter mismatch - 03/23/2025 12:27:33
// Commit 65: v0.35.3 - Added Quants tracking endpoint - 03/23/2025 12:27:33
// Commit 66: v0.36.0 - Added Quants tracking endpoint - 03/23/2025 12:27:33
// Commit 67: v0.37.0 - Rest API bug fixed - 03/23/2025 12:27:33
// Commit 68: v0.37.1 - Fixed Quants overflow in response - 03/23/2025 12:27:33
// Commit 69: v0.37.2 - Corrected goblin spawn logic - 03/23/2025 12:27:34
// Commit 70: v0.37.3 - Resolved meat allocation error - 03/23/2025 12:27:34
// Commit 71: v0.37.4 - Fixed gold counter mismatch - 03/23/2025 12:27:34
// Commit 72: v0.37.5 - Fixed Quants overflow in response - 03/23/2025 12:27:34
// Commit 73: v0.37.6 - Implemented goblin spawn API - 03/23/2025 12:27:34
// Commit 74: v1.0.0 - Major update: API restructuring for Scrap Slayer - 03/23/2025 12:27:34
// Commit 75: v1.0.0 - Corrected goblin spawn logic - 03/23/2025 12:27:34
// Commit 76: v1.0.1 - Resolved meat allocation error - 03/23/2025 12:27:34
// Commit 77: v1.0.2 - Resolved meat allocation error - 03/23/2025 12:27:35
// Commit 78: v1.0.3 - Integrated gold counter endpoint - 03/23/2025 12:27:35
// Commit 79: v1.1.0 - Resolved meat allocation error - 03/23/2025 12:27:35
// Commit 80: v1.1.1 - Added Quants tracking endpoint - 03/23/2025 12:27:35
// Commit 81: v1.2.0 - Minor feature added of Food waste - 03/23/2025 12:27:35
// Commit 82: v1.3.0 - Fixed gold counter mismatch - 03/23/2025 12:27:35
// Commit 83: v1.3.1 - Integrated gold counter endpoint - 03/23/2025 12:27:35
// Commit 84: v1.4.0 - Fixed gold counter mismatch - 03/23/2025 12:27:35
// Commit 85: v1.4.1 - Added Quants tracking endpoint - 03/23/2025 12:27:35
// Commit 86: v1.5.0 - Fixed Quants overflow in response - 03/23/2025 12:27:36
// Commit 87: v1.5.1 - Fixed gold counter mismatch - 03/23/2025 12:27:36
// Commit 88: v1.5.2 - Resolved meat allocation error - 03/23/2025 12:27:36
// Commit 89: v1.5.3 - Corrected goblin spawn logic - 03/23/2025 12:27:36
// Commit 90: v1.5.4 - Minor feature added of Food waste - 03/23/2025 12:27:36
// Commit 91: v1.6.0 - Fixed gold counter mismatch - 03/23/2025 12:27:36
// Commit 92: v1.6.1 - Fixed gold counter mismatch - 03/23/2025 12:27:36
// Commit 93: v1.6.2 - Minor feature added of Food waste - 03/23/2025 12:27:36
// Commit 94: v1.7.0 - Added Quants tracking endpoint - 03/23/2025 12:27:37
// Commit 95: v1.8.0 - Integrated gold counter endpoint - 03/23/2025 12:27:37
// Commit 96: v1.9.0 - Added Quants tracking endpoint - 03/23/2025 12:27:37
// Commit 97: v1.10.0 - Implemented goblin spawn API - 03/23/2025 12:27:37
// Commit 98: v1.11.0 - Implemented goblin spawn API - 03/23/2025 12:27:37
// Commit 99: v1.12.0 - Fixed Quants overflow in response - 03/23/2025 12:27:37
// Commit 100: v1.12.1 - Implemented goblin spawn API - 03/23/2025 12:27:37
// Commit 101: v1.13.0 - Integrated gold counter endpoint - 03/23/2025 12:27:37
// Commit 102: v1.14.0 - Resolved meat allocation error - 03/23/2025 12:27:38
// Commit 103: v1.14.1 - Added meat allocation route - 03/23/2025 12:27:38
// Commit 104: v1.15.0 - Corrected goblin spawn logic - 03/23/2025 12:27:38
// Commit 105: v1.15.1 - Rest API bug fixed - 03/23/2025 12:27:38
// Commit 106: v1.15.2 - Resolved meat allocation error - 03/23/2025 12:27:38
// Commit 107: v1.15.3 - Added meat allocation route - 03/23/2025 12:27:38
// Commit 108: v1.16.0 - Resolved meat allocation error - 03/23/2025 12:27:38
// Commit 109: v1.16.1 - Added Quants tracking endpoint - 03/23/2025 12:27:38
// Commit 110: v1.17.0 - Corrected goblin spawn logic - 03/23/2025 12:27:38
// Commit 111: v1.17.1 - Resolved meat allocation error - 03/23/2025 12:27:39
// Commit 112: v1.17.2 - Rest API bug fixed - 03/23/2025 12:27:39
// Commit 113: v1.17.3 - Minor feature added of Food waste - 03/23/2025 12:27:39
// Commit 114: v1.18.0 - Added meat allocation route - 03/23/2025 12:27:39
// Commit 115: v1.19.0 - Corrected goblin spawn logic - 03/23/2025 12:27:39
// Commit 116: v1.19.1 - Implemented goblin spawn API - 03/23/2025 12:27:39
// Commit 117: v1.20.0 - Fixed gold counter mismatch - 03/23/2025 12:27:39
// Commit 118: v1.20.1 - Added meat allocation route - 03/23/2025 12:27:39
// Commit 119: v1.21.0 - Fixed gold counter mismatch - 03/23/2025 12:27:40
// Commit 120: v1.21.1 - Resolved meat allocation error - 03/23/2025 12:27:40
// Commit 121: v1.21.2 - Added Quants tracking endpoint - 03/23/2025 12:27:40
// Commit 122: v1.22.0 - Resolved meat allocation error - 03/23/2025 12:27:40
// Commit 123: v1.22.1 - Rest API bug fixed - 03/23/2025 12:27:40
// Commit 124: v1.22.2 - Added meat allocation route - 03/23/2025 12:27:40
// Commit 125: v1.23.0 - Fixed Quants overflow in response - 03/23/2025 12:27:40
// Commit 126: v1.23.1 - Added meat allocation route - 03/23/2025 12:27:40
// Commit 127: v1.24.0 - Resolved meat allocation error - 03/23/2025 12:27:41
