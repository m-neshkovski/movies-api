<?php

use App\Http\Controllers\MovieApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/movies/{movie:slug}', [MovieApiController::class, 'show'])->middleware('auth:api');
Route::get('v1/movies', [MovieApiController::class, 'search'])->middleware('auth:api');
Route::get('v1/categories', [MovieApiController::class, 'categories'])->middleware('auth:api');
