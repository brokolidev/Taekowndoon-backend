<?php

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', function (LoginRequest $request) {
    $request->authenticate();

    $user = Auth::user();

    $token = $user->createToken('api-token')->plainTextToken;

    return ['token' => $token];
});