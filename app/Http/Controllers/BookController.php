<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookTranslation;
use App\Models\Genre;
use App\Models\GenreTranslation;
use App\Models\Keyword;
use App\Models\KeywordTranslation;
use App\Models\Language;
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_hu' => 'required|string|max:255',
            'title_en' => 'nullable|string|max:255',
            'author' => 'required|string',
            'publication_year' => 'nullable|integer|min:1000|max:' . date('Y'),
            'description_hu' => 'nullable|string',
            'description_en' => 'nullable|string',
            'keywords' => 'required|json',
            'genres' => 'required|json',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:16384',
        ]);

        if ($request->hasFile('cover_image')) {
            $imagePath = $request->file('cover_image')->store('covers', 'public');
        } else {
            $imagePath = null;
        }

        $book = new Book();
        $book->title = $validated['title_hu'];
        $book->description = $validated['description_hu'];
        $book->publication_year = $validated['publication_year'];
        $book->cover_image = $imagePath;
        $book->save();

        $languageHu = Language::where('code', 'hu')->first();
        $languageEn = Language::where('code', 'en')->first();

        $bookTranslationHu = new BookTranslation();
        $bookTranslationHu->book_id = $book->id;
        $bookTranslationHu->language_id = $languageHu->id;
        $bookTranslationHu->title = $validated['title_hu'];
        $bookTranslationHu->description = $validated['description_hu'];
        $bookTranslationHu->save();

        if (!empty($validated['title_en'])) {
            $bookTranslationEn = new BookTranslation();
            $bookTranslationEn->book_id = $book->id;
            $bookTranslationEn->language_id = $languageEn->id;
            $bookTranslationEn->title = $validated['title_en'];
            $bookTranslationEn->description = $validated['description_en'];
            $bookTranslationEn->save();
        }

        $authors = explode(',', $validated['author']);
        foreach ($authors as $authorName) {
            $author = Author::firstOrCreate(['name' => trim($authorName)]);
            if (!$book->authors()->where('author_id', $author->id)->exists()) {
                $book->authors()->attach($author->id);
            }
        }

        $keywords = json_decode($request->keywords, true);
        foreach ($keywords as $keyword) {
            $keywordHu = Keyword::firstOrCreate(['name' => $keyword['hu']]);
            $book->keywords()->attach($keywordHu->id);

            $keywordTranslation = new KeywordTranslation();
            $keywordTranslation->keyword_id = $keywordHu->id;
            $keywordTranslation->language_id = $languageEn->id;
            $keywordTranslation->name = $keyword['en'];
            $keywordTranslation->save();
        }

        $genres = json_decode($request->genres, true);
        foreach ($genres as $genre) {
            $genreHu = Genre::firstOrCreate(['name' => $genre['hu']]);
            $book->genres()->attach($genreHu->id);

            $genreTranslation = new GenreTranslation();
            $genreTranslation->genre_id = $genreHu->id;
            $genreTranslation->language_id = $languageEn->id;
            $genreTranslation->name = $genre['en'];
            $genreTranslation->save();
        }

        return response()->json(['message' => 'Book added successfully!'], 200);
    }

}
