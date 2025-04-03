<?php

use App\Http\Controllers\PlayerWasteController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->name('v1.')->group(function () { 
    Route::get('/waste/{player_id}', [PlayerWasteController::class, 'show'])
         ->name('waste.show');

    Route::post('/waste', [PlayerWasteController::class, 'store'])
         ->name('waste.store');

    Route::put('/waste/{player_id}', [PlayerWasteController::class, 'update'])
         ->name('waste.update');

    Route::delete('/waste/{player_id}', [PlayerWasteController::class, 'destroy'])
           ->name('waste.destroy');
});