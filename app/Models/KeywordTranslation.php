<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordTranslation extends Model
{
    public function keyword()
    {
        return $this->belongsTo(Keyword::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
