<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use App\Http\Controllers\API\ScoreController;
use App\Http\Controllers\API\TopupController;
use App\Http\Controllers\API\TransferController;


Route::middleware(['auth:sanctum'])->group(function () {

      // crud student
// Route::post('/create',[FormController::class, 'create']);
// Route::get('/edit/{id}',[FormController::class, 'edit']);
// Route::post('/edit/{id}',[FormController::class, 'update']);
// Route::get('/delete/{id}',[FormController::class, 'delete']);
    

// //     crud score
// Route::post('/create-score-student', [ScoreController::class, 'create']);
// Route::get('/get-student/{id}', [ScoreController::class, 'getStudent']);
// Route::post('/data-student/{id}', [ScoreController::class, 'update']);

Route::post('/topup', [TopupController::class, 'doTopup']);
// Route::get('checkSaldoUser', 'TopupController@checkSaldo');
// Route::get('userbalance/history', 'TopupController@history');

Route::post('/send-saldo', [TransferController::class, 'sendSaldo']);



Route::get('/logout', [AuthController::class, 'logout']);
});


Route::post('/login',[AuthController::class, 'login']);

