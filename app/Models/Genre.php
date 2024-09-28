<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_genres');
    }

    public function translations()
    {
        return $this->hasMany(GenreTranslation::class);
    }
}
