<?php

use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\UserController;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// need to be authenticated
Route::middleware(['auth:sanctum'])->group(function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', function (Request $request) {
        $request->user()->tokens()->delete();
    });
});

Route::post('/login', function (LoginRequest $request) {
    $request->authenticate();

    $user = Auth::user();

    $token = $user->createToken('api-token')->plainTextToken;

    return ['token' => $token];
});


Route::get('/schedule', [ScheduleController::class, 'index']);
Route::get('/students', [UserController::class, 'getStudents']);
