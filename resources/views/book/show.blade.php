<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Page</title>
    <link rel="stylesheet" href="{{asset('css/book-page.css')}}">

</head>
<body>
<div class="book-page">
    <div class="book-cover">
        <img src="http://konyvtarkezelo.test/storage/{{ $book->cover_image }}" alt="Book Cover" class="cover-image">
    </div>

    <div class="book-info">
        <h1 class="book-title">{{ $book->title }}</h1>
        <h2 class="book-authors">
            @foreach($book->authors as $author)
                {{ $author->name }}
            @endforeach
        </h2>

        <p class="book-description">
            {{ $book->description }}
        </p>

        <div class="book-meta">
            <div class="meta-item group-container">
                <p>Kiadás éve:</p> <div class="item">{{$book->publication_year}}</div>
            </div>

            <div class="meta-item">
                <div class="group-container">
                    <p>Kategóriák:</p>
                    @foreach($book->genres as $genre)
                        <div class="item">{{ $genre->name }}</div>
                    @endforeach
                </div>
            </div>

            <div class="meta-item">
                <div class="group-container">
                    <p>Kulcsszavak:</p>
                    @foreach($book->keywords as $keyword)
                        <div class="item">{{ $keyword->name }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
