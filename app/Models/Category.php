<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'id', 'created_at', 'updated_at'
    ];

    public function movies() {
        return $this->hasMany(Movie::class);
    }
}
