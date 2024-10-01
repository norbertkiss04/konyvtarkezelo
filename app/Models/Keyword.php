<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    protected $fillable = ['name'];
    public function books()
    {
        return $this->belongsToMany(Book::class, 'book_keywords');
    }

    public function translations()
    {
        return $this->hasMany(KeywordTranslation::class);
    }
}
