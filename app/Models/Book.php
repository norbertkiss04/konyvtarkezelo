<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = [
        'title',
        'description',
        'publication_year',
        'cover_image',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'book_authors');
    }

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class, 'book_keywords');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_genres');
    }

    public function translations()
    {
        return $this->hasMany(BookTranslation::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
