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

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'created_at', 'updated_at', 'category_id'
    ];

    protected $with = [
        'categories',
    ];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search_title'] ?? false, function($query, $search) {
            $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%'));
        });

        $query->when($filters['category'] ?? false, fn($query, $category) => 
        
            $query->whereHas('categori', fn($query) =>
                $query->where('slug', 'like', '%' . $category . '%')
            )
        );
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }

}
