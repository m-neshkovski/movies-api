<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{
       
    public function search() {
        
        return response()->json(
            [
                'code' => 200,
                'data' => Movie::latest()->filter(request(['search_title', 'category']))->get(),
            ]
        );
        
    }


    public function show(Movie $movie)
    {
        return response()->json(
            [
                'code' => 200,
                'data' => $movie,
            ]
        );
    }

    public function categories() {
        try {
            $response = response()->json([
                'code' => 200,
                'data' => Category::all(),
            ]);
        } catch (Exception $e) {
            $response = response()->json($e);
        }

        return $response;
    }
}
