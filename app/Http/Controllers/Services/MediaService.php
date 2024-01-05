<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaService
{

    /**
     * MOVIES SECTION
     *
     * @return void
     */

    public function trending_movies()
    {
        
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/trending/movie/day')
            // ->json()['results'];
            Cache::rememberForever('movies-trending', function(){
                return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/trending/movie/day')
                ->json()['results'];
            });
            
    }


    public function popularMovies($page = 1)
    {
        abort_if($page > 500, 204);
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/popular?page='.$page.'?append_to_response=credits,videos,images')
        //     ->json()['results'];
      
        Cache::rememberForever('movies-popular', function() use($page){
            return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular?page='.$page.'?append_to_response=credits,videos,images')
                 ->json()['results'];
        });
    }

    public function top_ratedMovies()
    {
        return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];
    }

    public function up_comingMovies()
    {

        // return  Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/movie/upcoming')
        //     ->json()['results'];

            // Cache::rememberForever('movie-upcoming', function(){
            //     return Http::withToken(config('services.tmdb.token'))
            //     ->get('https://api.themoviedb.org/3/movie/upcoming')
            //     ->json()['results'];
    
            // });
    }

    public function movie_genres()
    {
        Cache::rememberForever('movies-genre', function(){
        return Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/movie/list')
        ->json()['genres'];
    });
    // return Cache::get('movie-genre');
    }


    public function nowPlayingMovies()
    {
            Cache::rememberForever('movies-nowplaying', function(){
                return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/movie/now_playing')
                ->json()['results'];
    
            });
    }






    /**
     * TV SECTION
     *
     * @return void
     */
    public function trending_tv()
    {
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/trending/tv/day')
        //     ->json()['results'];
            Cache::rememberForever('trendingTv', function(){
                return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/trending/tv/day')
                    ->json()['results'];
    
            });
    }
    
    public function popularTv($page = 1)
    {
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/tv/popular?page='.$page)
        //     ->json()['results'];
            Cache::rememberForever('popularTv', function() use($page){
                return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/tv/popular?page='.$page)
            ->json()['results'];
    
            });
    }

    // public function topRatedTv()
    // {
    //     return Http::withToken(config('services.tmdb.token'))
    //         ->get('https://api.themoviedb.org/3/tv/top_rated')
    //         ->json()['results'];
    // }


    public function tv_genres()
    {
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/genre/tv/list')
        //     ->json()['genres'];
            Cache::rememberForever('genresTv', function(){
                return Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/genre/tv/list')
                ->json()['genres'];
    
            });
    }



    // public function stream()
    // {
    //     # code...
    // }
    // public function stream()
    // {
    //     # code...
    // }
    // public function stream()
    // {
    //     # code...
    // }






}
