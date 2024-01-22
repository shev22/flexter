<?php

namespace App\Http\Controllers\Services;


use App\Repositories\GenreRepository;
use App\Repositories\OnAirRepository;
use Illuminate\Support\Facades\Cache;
use App\Repositories\PorpularRepository;
use App\Repositories\TopRatedRepository;
use App\Repositories\TrendingRepository;
use App\Repositories\UpComingRepository;
use App\Repositories\NowPlayingRepository;
use App\Repositories\AiringTodayRepository;


class MediaService
{



    public function __construct(

        private OnAirRepository $onAir,
        private GenreRepository $genre,
        private PorpularRepository $porpular,
        private UpComingRepository $upComing,
        private TopRatedRepository $topRated,
        private TrendingRepository $trending,
        private NowPlayingRepository $nowPlaying,
        private AiringTodayRepository $airingToday,

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
            return   $this->porpular->porpular('movie', 500);
        });
    }

    public function top_ratedMovies()
    {
       
        return Cache::rememberForever('movies-toprated', function () {
            return $this->topRated->topRated('movie', 455);
        });
    }

    public function up_comingMovies()
    {
        // $this->upComing->upComing('movie', 100);
        return Cache::rememberForever('movies-upcoming', function () {
            return    $this->upComing->upComing('movie', 47);
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
            return   $this->nowPlaying->nowPlaying('movie', 148);
        });
    }



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
        // return  $this->porpular->porpular('tv', 50);
        Cache::rememberForever('tv-popular', function () {
            return  $this->porpular->porpular('tv', 500);
        });
    }

    public function topRatedTv()
    {

        Cache::rememberForever('tv-toprated', function () {
            return $this->topRated->topRated('tv', 94);
        });
    }

    public function airingToday()
    {
        // return  $this->airingToday->airingToday('tv', 16);
        Cache::rememberForever('tv-airingtoday', function () {
            return  $this->airingToday->airingToday('tv', 16);
        });
    }

    public function onAir()
    {
        // return $this->onAir->onAir('tv', 100);
        Cache::rememberForever('tv-onair', function () {
            return $this->onAir->onAir('tv', 57);
        });
    }

    public function tv_genres()
    {

        Cache::rememberForever('tv-genre', function () {
            return $this->genre->genre('tv');
        });
    }



   public function trendingAll()
   {
    
    return Cache::rememberForever('all-trending', function () {
        return  $this->trending->trending('all', 'day');
    });
   }
}
