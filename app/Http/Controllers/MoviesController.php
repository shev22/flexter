<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Client\Pool;
use App\ViewModels\MovieViewModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Services\PagesService;

class MoviesController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function movies()
    {
   
        // Cache::flush();

        // $this->mediaService->logo('movie', 817187);
        // $this->mediaService->trending_movies();
        // $this->mediaService->popularMovies($page);
        // $this->mediaService->movie_genres();
        // $this->mediaService->nowPlayingMovies();



        return view('movies.movies');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show($slug, $id)
    {
       
     
      
        // $movie = Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
        //     ->json();
        // $related =  Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/' . $id . '/similar')
        //     ->json()['results'];

     
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images'),
            $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $id . '/similar'),
     
        ]);

        $movie = $responses[0]->json();
        $related = $responses[1]->json()['results'];



        //  dd(  $movie,      $related  );

        $viewModel = new MovieViewModel($movie,  $related);
   
        return view('movies.show', $viewModel);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
