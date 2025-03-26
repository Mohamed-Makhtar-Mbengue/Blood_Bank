<?php

use App\Http\Controllers\Api\EmergencyApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('emergencies', EmergencyApiController::class);
    
    Route::post('emergencies/{emergency}/complete', 
        [EmergencyApiController::class, 'complete']);
});