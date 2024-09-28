<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTranslation extends Model
{
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
