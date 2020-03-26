<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    protected $fillable = ['order'];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
