<?php


use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/getBooks', [BookController::class, 'getBooks']);
Route::post('/newBook', [BookController::class, 'store'])->name('api.books.store');
