<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('/authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('/genres', GenreController::class)->only(['index', 'show']);
Route::apiResource('/books', BookController::class)->only(['index', 'show']);

Route::middleware(['auth:api', 'admin'])->group(function () {
    
    Route::apiResource('/authors', AuthorController::class)->except(['index', 'show']);
    Route::apiResource('/genres', GenreController::class)->except(['index', 'show']);
    Route::apiResource('/books', BookController::class)->except(['index', 'show']); 

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [AuthController::class, 'profile']);
});