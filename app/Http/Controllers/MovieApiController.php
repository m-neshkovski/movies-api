<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Support\Facades\Cache;

class MovieApiController extends Controller
{    
    public function search()
    { 
        $search_title = request('search_title') ? '.' . request('search_title') : '';
        $category = request('category') ? '.' . request('category') : '';
        $cache_name = 'filter' . $search_title . $category;

        $filter_data = Cache::rememberForever($cache_name, function() {
            return Movie::filter(request(['search_title', 'category']))->get();
        });

        return response()->json(
            [
                'code' => 200,
                'data' => $filter_data,
            ]
        ); 
    }

    public function show($slug)
    {
        $movie = Cache::rememberForever('movie.' . $slug, function() use ($slug) {
            return Movie::where('slug', $slug)->first();
        });

        return response()->json(
            [
                'code' => 200,
                'data' => $movie,
            ]
        );
    }

    public function categories()
    {
        $categories = Cache::rememberForever('categories.all', function() {
            return Category::all();
        });

        return response()->json(
            [
                'code' => 200,
                'data' => $categories,
            ]
        );
    }
}
