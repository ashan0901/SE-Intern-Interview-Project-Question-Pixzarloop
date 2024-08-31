<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\BookController;
use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/book', [BookController::class, 'index']);

Route::post('/book', [BookController::class, 'store']);

Route::put('/book/edit/{id}', [BookController::class, 'update']);

Route::delete('/book/delete/{id}', [BookController::class, 'delete']);

Route::get('/borrow', [BorrowRecordController::class, 'index']);

Route::post('/addBorrow', [BorrowRecordController::class, 'addBorrow']);

Route::post('/author', [AuthorController::class, 'add']);

Route::put('/author/edit/{id}', [AuthorController::class, 'update']);

Route::delete('/author/delete/{id}', [AuthorController::class, 'delete']);

Route::post('/publisher', [PublisherController::class, 'add']);

Route::delete('/publisher/delete/{id}', [PublisherController::class, 'delete']);

Route::post('/category', [CategoryController::class, 'add']);

Route::delete('/category/delete/{id}', [CategoryController::class, 'delete']);

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');;
