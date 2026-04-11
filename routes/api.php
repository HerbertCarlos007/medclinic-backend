<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/clinic', [ClinicController::class, 'store']);
Route::get('/clinic', [ClinicController::class, 'index']);
Route::put('/clinic/{clinic}', [ClinicController::class, 'update']);

Route::prefix('user')->group(function () {
    Route::get('/clinic/{clinic}', [UserController::class, 'indexByClinic']);
    Route::get('/{user}', [UserController::class, 'show']);
    Route::put('/{user}', [UserController::class, 'update']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
