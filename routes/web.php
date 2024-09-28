<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
route::get('/book/{id}', [BookController::class, 'getBookById'])->name('book.show');
