<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CatedoryMovie extends Pivot
{
    public function movie() {
        return $this->belongsTo(Movie::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
