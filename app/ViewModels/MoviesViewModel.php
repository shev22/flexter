<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class MoviesViewModel extends ViewModel
{
    // public $popularMovies;
    public $top_rated;
    // public $trending_movies;
    public $up_coming;
    // public $genres;


    // public function __construct(  $popularMovies = null, $genres = null, $top_rated = null, $up_coming = null, $trending_movies = null)
    // {
    //     $this->popularMovies = $popularMovies;
    //     $this->top_rated = $top_rated;
    //     $this->up_coming = $up_coming;
    //     $this->genres = $genres;
    //     $this->trending_movies = $trending_movies;

    // }

    public function popularMovies()
    {
   
       
        //  $this->formatMovies(Cache::get('movies-popular'));
    }

    public function top_rated()
    {
        return $this->formatMovies($this->top_rated);
    }

    public function trending()
    {
       
        return $this->formatMovies(Cache::get('movies-trending'));
    }

    public function nowPlayingMovies()
    {
        // dd(Cache::get('movies-nowplaying'));
        return $this->formatMovies(Cache::get('movies-nowplaying'));
    }

    public function genres()
    {
        return collect(Cache::get('movies-genre'))->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function up_coming()
    {
        return $this->formatMovies($this->up_coming);
    }


    private function formatMovies($movies)
    {
        
        return collect($movies)->map(function ($movie) {
            $genresFormatted = collect($movie['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($movie)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path'],
                'backdrop_path' => $movie['backdrop_path'],
                'vote_average' => round($movie['vote_average'], 1),
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'logo', 'overview', 'release_date', 'genres', 'media_type', 'backdrop_path'
            ])->put('slug',  Str::of($movie['title'])->slug('-'));
        });
    }
}
