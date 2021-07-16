<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_code',
        'title',
        'slug',
        'category_id',
        'img_url',
        'release_year',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
