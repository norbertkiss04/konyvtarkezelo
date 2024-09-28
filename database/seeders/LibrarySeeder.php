<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
        // Seed languages
        $hungarian = DB::table('languages')->insertGetId([
            'code' => 'hu',
            'name' => 'Hungarian',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $english = DB::table('languages')->insertGetId([
            'code' => 'en',
            'name' => 'English',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $german = DB::table('languages')->insertGetId([
            'code' => 'de',
            'name' => 'German',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed authors
        $author1 = DB::table('authors')->insertGetId([
            'name' => 'Jókai Mór',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $author2 = DB::table('authors')->insertGetId([
            'name' => 'Molnár Ferenc',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed genres
        $genre1 = DB::table('genres')->insertGetId([
            'name' => 'Historical Fiction',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $genre2 = DB::table('genres')->insertGetId([
            'name' => 'Drama',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed books
        $book1 = DB::table('books')->insertGetId([
            'title' => 'Az arany ember',
            'description' => 'Egy izgalmas történet szerelemről és ármányról.',
            'publication_date' => '1873-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $book2 = DB::table('books')->insertGetId([
            'title' => 'A Pál utcai fiúk',
            'description' => 'A történet fiatal fiúk barátságáról és hősiességéről szól.',
            'publication_date' => '1907-01-01',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed book authors
        DB::table('book_authors')->insert([
            'book_id' => $book1,
            'author_id' => $author1,
        ]);

        DB::table('book_authors')->insert([
            'book_id' => $book2,
            'author_id' => $author2,
        ]);

        // Seed book genres
        DB::table('book_genres')->insert([
            'book_id' => $book1,
            'genre_id' => $genre1,
        ]);

        DB::table('book_genres')->insert([
            'book_id' => $book2,
            'genre_id' => $genre2,
        ]);

        // Seed translations for books
        DB::table('book_translations')->insert([
            'book_id' => $book1,
            'language_id' => $english,
            'title' => 'The Man with the Golden Touch',
            'description' => 'An exciting story about love and intrigue.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('book_translations')->insert([
            'book_id' => $book1,
            'language_id' => $german,
            'title' => 'Der Mann mit der goldenen Hand',
            'description' => 'Eine spannende Geschichte über Liebe und Intrigen.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('book_translations')->insert([
            'book_id' => $book2,
            'language_id' => $english,
            'title' => 'The Paul Street Boys',
            'description' => 'The story is about friendship and heroism among young boys.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('book_translations')->insert([
            'book_id' => $book2,
            'language_id' => $german,
            'title' => 'Die Jungen der Paulstraße',
            'description' => 'Die Geschichte handelt von Freundschaft und Heldentum junger Jungen.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed keywords
        $keyword1 = DB::table('keywords')->insertGetId([
            'name' => 'Kalandregény',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $keyword2 = DB::table('keywords')->insertGetId([
            'name' => 'Ifjúsági irodalom',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Seed book keywords
        DB::table('book_keywords')->insert([
            'book_id' => $book1,
            'keyword_id' => $keyword1,
        ]);

        DB::table('book_keywords')->insert([
            'book_id' => $book2,
            'keyword_id' => $keyword2,
        ]);

        // Seed keyword translations
        DB::table('keyword_translations')->insert([
            'keyword_id' => $keyword1,
            'language_id' => $english,
            'name' => 'Adventure novel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('keyword_translations')->insert([
            'keyword_id' => $keyword1,
            'language_id' => $german,
            'name' => 'Abenteuerroman',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('keyword_translations')->insert([
            'keyword_id' => $keyword2,
            'language_id' => $english,
            'name' => 'Young adult literature',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('keyword_translations')->insert([
            'keyword_id' => $keyword2,
            'language_id' => $german,
            'name' => 'Jugendliteratur',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
