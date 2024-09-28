<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LibrarySeeder extends Seeder
{
    public function run(): void
    {
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

        $authors = [
            'Jókai Mór',
            'Molnár Ferenc',
            'Gárdonyi Géza',
            'Kosztolányi Dezső',
            'Szabó Magda'
        ];

        $authorIds = [];
        foreach ($authors as $author) {
            $authorIds[] = DB::table('authors')->insertGetId([
                'name' => $author,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $genres = [
            'Historical Fiction',
            'Drama',
            'Romance',
            'Psychological Fiction',
            'Coming-of-age'
        ];

        $genreIds = [];
        foreach ($genres as $genre) {
            $genreIds[] = DB::table('genres')->insertGetId([
                'name' => $genre,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $books = [
            [
                'title' => 'Az arany ember',
                'description' => 'Egy izgalmas történet szerelemről és ármányról.',
                'cover_image' => '1.jpg',
                'publication_year' => 1873,
                'author_id' => $authorIds[0],
                'genre_ids' => [$genreIds[0], $genreIds[2]],
                'english_title' => 'The Man with the Golden Touch',
                'english_description' => 'An exciting story about love and intrigue.',
            ],
            [
                'title' => 'A Pál utcai fiúk',
                'description' => 'A történet fiatal fiúk barátságáról és hősiességéről szól.',
                'cover_image' => '2.jpg',
                'publication_year' => 1907,
                'author_id' => $authorIds[1],
                'genre_ids' => [$genreIds[1], $genreIds[4]],
                'english_title' => 'The Paul Street Boys',
                'english_description' => 'The story is about friendship and heroism among young boys.',
            ],
            [
                'title' => 'Egri csillagok',
                'description' => 'Történelmi regény a 16. századi Magyarországról és az egri vár ostromáról.',
                'cover_image' => '5.jpg',
                'publication_year' => 1899,
                'author_id' => $authorIds[2],
                'genre_ids' => [$genreIds[0], $genreIds[2]],
                'english_title' => 'Eclipse of the Crescent Moon',
                'english_description' => 'A historical novel about 16th century Hungary and the siege of Eger Castle.',
            ],
            [
                'title' => 'Édes Anna',
                'description' => 'Egy cselédlány és munkaadói közötti feszültségek lélektani elemzése.',
                'cover_image' => '3.jpg',
                'publication_year' => 1926,
                'author_id' => $authorIds[3],
                'genre_ids' => [$genreIds[3], $genreIds[1]],
                'english_title' => 'Anna Édes',
                'english_description' => 'A psychological analysis of tensions between a maid and her employers.',
            ],
            [
                'title' => 'Abigél',
                'description' => 'Egy fiatal lány kalandjai egy szigorú bentlakásos iskolában a II. világháború idején.',
                'cover_image' => '4.jpg',
                'publication_year' => 1970,
                'author_id' => $authorIds[4],
                'genre_ids' => [$genreIds[4], $genreIds[0]],
                'english_title' => 'Abigail',
                'english_description' => 'The adventures of a young girl in a strict boarding school during World War II.',
            ],
        ];

        foreach ($books as $book) {
            $bookId = DB::table('books')->insertGetId([
                'title' => $book['title'],
                'description' => $book['description'],
                'cover_image' => $book['cover_image'],
                'publication_year' => $book['publication_year'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            DB::table('book_authors')->insert([
                'book_id' => $bookId,
                'author_id' => $book['author_id'],
            ]);

            foreach ($book['genre_ids'] as $genreId) {
                DB::table('book_genres')->insert([
                    'book_id' => $bookId,
                    'genre_id' => $genreId,
                ]);
            }

            DB::table('book_translations')->insert([
                'book_id' => $bookId,
                'language_id' => $english,
                'title' => $book['english_title'],
                'description' => $book['english_description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $keywords = [
            'Kalandregény' => 'Adventure novel',
            'Ifjúsági irodalom' => 'Young adult literature',
            'Történelmi regény' => 'Historical novel',
            'Háborús regény' => 'War novel',
            'Pszichológiai thriller' => 'Psychological thriller',
            'Társadalomkritika' => 'Social criticism',
            'Romantikus regény' => 'Romantic novel',
            'Fejlődésregény' => 'Coming-of-age novel',
        ];

        $keywordIds = [];
        foreach ($keywords as $hungarianKeyword => $englishKeyword) {
            $keywordId = DB::table('keywords')->insertGetId([
                'name' => $hungarianKeyword,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);

            $keywordIds[] = $keywordId;

            DB::table('keyword_translations')->insert([
                'keyword_id' => $keywordId,
                'language_id' => $english,
                'name' => $englishKeyword,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        $bookKeywords = [
            1 => [0, 2, 6],
            2 => [1, 7],
            3 => [0, 2, 3],
            4 => [4, 5],
            5 => [1, 3, 7],
        ];

        foreach ($bookKeywords as $bookId => $keywords) {
            foreach ($keywords as $keywordIndex) {
                DB::table('book_keywords')->insert([
                    'book_id' => $bookId,
                    'keyword_id' => $keywordIds[$keywordIndex],
                ]);
            }
        }
    }
}
