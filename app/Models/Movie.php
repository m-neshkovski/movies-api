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
        'id', 'created_at', 'updated_at', 'category_id'
    ];

    protected $with = [
        'category',
    ];

    public function scopeFilter($query, array $filters)
    {

        $query->when($filters['search_title'] ?? false, function($query, $search) {
            $query->where(fn($query) => $query->where('title', 'like', '%' . $search . '%'));
        });

        $query->when($filters['category'] ?? false, fn($query, $category) => 
        
            $query->whereHas('category', fn($query) =>
                $query->where('slug', $category)
            )
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
