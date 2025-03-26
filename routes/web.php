<?php

use App\Http\Controllers\EmergencyController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    // Emergency routes
    Route::prefix('emergencies')->group(function () {
        Route::get('/', [EmergencyController::class, 'index'])->name('emergencies.index');
        Route::get('/create', [EmergencyController::class, 'create'])->name('emergencies.create');
        Route::post('/', [EmergencyController::class, 'store'])->name('emergencies.store');
        Route::get('/{emergency}', [EmergencyController::class, 'show'])->name('emergencies.show');
        Route::patch('/{emergency}/complete', [EmergencyController::class, 'complete'])->name('emergencies.complete');
    });
    
    // Other routes (donors, donations, inventory, etc.)
});