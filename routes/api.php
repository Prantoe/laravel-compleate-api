<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;


Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/create',[FormController::class, 'create']);
    Route::get('/edit/{id}',[FormController::class, 'edit']);
    Route::post('/edit/{id}',[FormController::class, 'update']);
      Route::get('/delete/{id}',[FormController::class, 'delete']);
    Route::get('/logout', [AuthController::class, 'logout']);
});


Route::post('/login',[AuthController::class, 'login']);

