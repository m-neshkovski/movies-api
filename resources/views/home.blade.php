@extends('layouts.app')

@section('content')
<div id="home" class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div id="cardBody" class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h3>Your API Token, you have {{ auth()->user()->api_limit }} attempts left. Use them wiselly.</h3>

                    <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">api_token</span>
                        </div>

                            <input id="apiTokenInput" type="text" class="form-control" aria-label="api_token" aria-describedby="basic-addon1" value="{{ auth()->user()->api_token }}">
                            
                        <div class="input-group-append">
                          <button id="copyBtn" class="btn btn-primary copyBtn">Copy</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-header">{{ __('API Documentation') }}</div>

                <div class="card-body">
                    <p>You have to include your api_token in the request. The response is in JSON format.</p>

                    <div class="pb-3">
                        <h4>All categories in DB:</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="api_token" value="http://localhost:8000/api/v1/categories">
                            <div class="input-group-append">
                                <button class="btn btn-primary copyBtn">Copy</button>
                            </div>
                        </div>
                        <small class="text-danger">*(This route will not spend your FREE attempts, used for select filter)</small>
                    </div>
                    
                    <div class="pb-3">
                        <h4>Get data from DB for a movie by its slug:</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="all_movies" value="http://localhost:8000/api/v1/movies/{'slug'}">
                            <div class="input-group-append">
                            <button class="btn btn-primary copyBtn">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <h4>All movies in DB:</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="all_movies" value="http://localhost:8000/api/v1/movies">
                            <div class="input-group-append">
                            <button class="btn btn-primary copyBtn">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <h4>Search for movies by title in DB:</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="all_movies" value="http://localhost:8000/api/v1/movies?search_title={'search_term'}">
                            <div class="input-group-append">
                            <button class="btn btn-primary copyBtn">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <h4>All movies by category in DB:</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="all_movies" value="http://localhost:8000/api/v1/movies?category={'category_slug'}">
                            <div class="input-group-append">
                            <button class="btn btn-primary copyBtn">Copy</button>
                            </div>
                        </div>
                    </div>

                    <div class="pb-3">
                        <h4>You can combine search_title and category parameters to search for a movies by title in given category:</h4>
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="all_movies" value="http://localhost:8000/api/v1/movies?search_title={'search_term'}&category={'category_slug'}">
                            <div class="input-group-append">
                            <button class="btn btn-primary copyBtn">Copy</button>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
