<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
    function getBooks(){
        return Book::with('authors')->get();
    }

    public function getBookById($id)
    {
        $book = Book::with([
            'authors',
            'keywords.translations.language',
            'genres.translations.language',
            'translations.language',
            'language',
        ])->findOrFail($id);

        Log::info($book);

        return view('book.show', compact('book'));
    }
}
