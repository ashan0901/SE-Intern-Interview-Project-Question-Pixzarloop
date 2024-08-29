<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\BookController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/book', [BookController::class, 'index']);

Route::post('/book', [BookController::class, 'store']);

Route::put('/book/edit/{id}', [BookController::class, 'update']);

Route::delete('/book/delete/{id}', [BookController::class, 'delete']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;
