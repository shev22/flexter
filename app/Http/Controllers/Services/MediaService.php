<?php

namespace App\Http\Controllers\Services;


use App\Repositories\GenreRepository;
use Illuminate\Support\Facades\Cache;
use App\Repositories\PorpularRepository;
use App\Repositories\TopRatedRepository;
use App\Repositories\TrendingRepository;
use App\Repositories\UpComingRepository;
use App\Repositories\NowPlayingRepository;


class MediaService
{



    public function __construct(
        private GenreRepository $genre,
        private PorpularRepository $porpular,
        private UpComingRepository $upComing,
        private TopRatedRepository $topRated,
        private TrendingRepository $trending,
        private NowPlayingRepository $nowPlaying,

    ) {
    }









    /**
     * MOVIES SECTION
     *
     * @return void
     */

    public function trending_movies()
    {
        return Cache::rememberForever('movies-trending', function () {
            return  $this->trending->trending('movie', 'day');
        });
    }


    public function popularMovies()
    {
        // return   $this->porpular->porpular('movie', 200);

        return  Cache::rememberForever('movies-popular', function () {
            return   $this->porpular->porpular('movie', 300);
        });
    }

    public function top_ratedMovies()
    {

        return Cache::rememberForever('movies-toprated', function () {
            return $this->topRated->topRated('movie');
        });
    }

    public function up_comingMovies()
    {

        return Cache::rememberForever('movies-upcoming', function () {
            return    $this->upComing->upComing('movie');
        });
    }

    public function movie_genres()
    {

        return  Cache::rememberForever('movies-genre', function () {
            return   $this->genre->genre('movie');
        });
        // return Cache::get('movie-genre');
    }


    public function nowPlayingMovies()
    {

        return  Cache::rememberForever('movies-nowplaying', function () {
            return   $this->nowPlaying->nowPlaying('movie');
        });
    }


    // public function logo($mediaType, $id)
    // {
    //     $mediaLogo = Http::withToken(config('services.tmdb.token'))
    //         ->get('https://api.themoviedb.org/3/' . $mediaType . '/' . $id . '?append_to_response=credits,videos,images')
    //         ->json()['images'];
    //     if ($mediaLogo !== []) {
    //         if ($mediaLogo['logos'] !== []) {
    //             return $mediaLogo['logos'][0]['file_path'];
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }



    /**
     * TV SECTION
     *
     * @return void
     */
    public function trending_tv()
    {

        Cache::rememberForever('tv-trending', function () {
            return $this->trending->trending('tv', 'day');
        });
    }

    public function popularTv()
    {

        Cache::rememberForever('tv-popular', function () {
            return  $this->porpular->porpular('tv', 250);
        });
    }

    public function topRatedTv()
    {

        Cache::rememberForever('tv-toprated', function () {
            return $this->topRated->topRated('tv');
        });
    }


    public function tv_genres()
    {

        Cache::rememberForever('tv-genre', function () {
            return $this->genre->genre('tv');
        });
    }

}
