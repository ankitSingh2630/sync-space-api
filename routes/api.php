<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SignUpController;
use App\Http\Controllers\Auth\SignInController;
use Illuminate\Http\Request;


// Public routes
Route::post('signup', [SignUpController::class, 'signup']);
Route::post('signin', [SignInController::class, 'signin']);

// Protected route
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user(); // Return the authenticated user's details
});

