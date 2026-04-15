<?php

use App\Http\Controllers\ClinicController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\SpecialtyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/clinic', [ClinicController::class, 'store']);
Route::get('/clinic', [ClinicController::class, 'index']);
Route::put('/clinic/{clinic}', [ClinicController::class, 'update']);

Route::prefix('user')->group(function () {
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/clinic/{clinic}', [UserController::class, 'indexByClinic']);
    Route::get('/{user}', [UserController::class, 'show']);
    Route::put('/{user}', [UserController::class, 'update']);
});

Route::prefix('specialty')->group(function () {
    Route::post('/', [SpecialtyController::class, 'store']);
    Route::get('/clinic/{clinic}', [SpecialtyController::class, 'indexByClinic']);
    Route::get('/{specialty}', [SpecialtyController::class, 'show']);
    Route::put('/{specialty}', [SpecialtyController::class, 'update']);
});

Route::prefix('doctor')->group(function () {
    Route::post('/', [DoctorController::class, 'store']);
    Route::get('/clinic/{clinic}', [DoctorController::class, 'indexByClinic']);
    Route::get('/{doctor}', [DoctorController::class, 'show']);
    Route::put('/{doctor}', [DoctorController::class, 'update']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
