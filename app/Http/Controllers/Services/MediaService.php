<?php

namespace App\Http\Controllers\Services;

use App\Models\TvModel;
use App\Models\ActorModel;
use App\Models\MovieModel;
use Illuminate\Support\Str;
use GuzzleHttp\Promise\Utils;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use App\Repositories\GenreRepository;
use App\Repositories\OnAirRepository;
use Illuminate\Support\Facades\Cache;
use App\Repositories\ActorsRepository;
use App\Repositories\ChangesRepository;
use App\Livewire\Traits\FormatDataTrait;
use App\Models\TopRated;
use App\Repositories\LanguageRepository;
use App\Repositories\PorpularRepository;
use App\Repositories\TopRatedRepository;
use App\Repositories\TrendingRepository;
use App\Repositories\UpComingRepository;
use App\Repositories\NowPlayingRepository;
use App\Repositories\AiringTodayRepository;

class MediaService
{
    use FormatDataTrait;


    public function __construct(

        private OnAirRepository $onAir,
        private GenreRepository $genre,
        private ActorsRepository $actors,
        private ChangesRepository $changes,
        private PorpularRepository $porpular,
        private UpComingRepository $upComing,
        private TopRatedRepository $topRated,
        private TrendingRepository $trending,
        private LanguageRepository $languages,
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
        Cache::put('movies-trending',  $this->trending->trending('movie', 'day'));
        // return Cache::rememberForever('movies-trending', function () {
        //     return  $this->trending->trending('movie', 'day');
        // });
    }

    // public function changes_movies()
    // {
    //     Cache::put('languages', $this->languages->languages());// return  $this->changes->changes('movie');
    //     return Cache::rememberForever('movies-changes', function () {
    //         return  $this->changes->changes('movie');
    //     });
    // }

    public function popularMovies()
    {
        // return   $this->porpular->porpular('movie', 5);
        Cache::put('movies-popular',  $this->porpular->porpular('movie', 500));
        // return  Cache::rememberForever('movies-popular', function () {
        //     return   $this->porpular->porpular('movie', 500);
        // });
    }

    public function top_ratedMovies()
    {
        Cache::put('movies-toprated', $this->topRated->topRated('movie', 466));
        // return Cache::rememberForever('movies-toprated', function () {
        //     return $this->topRated->topRated('movie', 459);
        // });
    }

    public function up_comingMovies()
    {
        Cache::put('movies-upcoming',  $this->upComing->upComing('movie', 51));
        // $this->upComing->upComing('movie', 100);
        // return Cache::rememberForever('movies-upcoming', function () {
        //     return    $this->upComing->upComing('movie', 39);
        // });
    }

    public function movie_genres()
    {
        Cache::put('movies-genre', $this->genre->genre('movie'));
        // return  Cache::rememberForever('movies-genre', function () {
        //     return   $this->genre->genre('movie');
        // });
        // return Cache::get('movie-genre');
    }


    public function nowPlayingMovies()
    {
        Cache::put('movies-nowplaying', $this->nowPlaying->nowPlaying('movie', 209));
        // return  Cache::rememberForever('movies-nowplaying', function () {
        //     return   $this->nowPlaying->nowPlaying('movie', 167);
        // });
    }



    /**
     * TV SECTION
     *
     * @return void
     */
    public function trending_tv()
    {
        Cache::put('tv-trending', $this->trending->trending('tv', 'day'));
        // Cache::rememberForever('tv-trending', function () {
        //     return $this->trending->trending('tv', 'day');
        // });
    }

    // public function changes_tv()
    // {
    //     return Cache::rememberForever('tv-changes', function () {
    //         return  $this->changes->changes('tv');
    //     });
    // }

    public function popularTv()
    {
        Cache::put('tv-popular', $this->porpular->porpular('tv', 500));
        // return  $this->porpular->porpular('tv', 50);
        // Cache::rememberForever('tv-popular', function () {
        //     return  $this->porpular->porpular('tv', 500);
        // });
    }

    public function topRatedTv()
    {
        Cache::put('tv-toprated', $this->topRated->topRated('tv', 98));
        // Cache::rememberForever('tv-toprated', function () {
        //     return $this->topRated->topRated('tv', 95);
        // });
    }

    public function airingToday()
    {
        Cache::put('tv-airingtoday', $this->airingToday->airingToday('tv', 17));
        // return  $this->airingToday->airingToday('tv', 16);
        // Cache::rememberForever('tv-airingtoday', function () {
        //     return  $this->airingToday->airingToday('tv', 17);
        // });
    }

    public function onAir()
    {
        Cache::put('tv-onair', $this->onAir->onAir('tv', 62));
        // return $this->onAir->onAir('tv', 100);
        // Cache::rememberForever('tv-onair', function () {
        //     return $this->onAir->onAir('tv', 60);
        // });
    }

    public function tv_genres()
    {
        Cache::put('tv-genre', $this->genre->genre('tv'));
        // Cache::rememberForever('tv-genre', function () {
        //     return $this->genre->genre('tv');
        // });
    }






    public function trendingAll()
    {
        Cache::put('all-trending', $this->trending->trending('all', 'day'));
        // return Cache::rememberForever('all-trending', function () {
        //     return  $this->trending->trending('all', 'day');
        // });
    }

    public function languages()
    {

        Cache::put('languages', $this->languages->languages());
        // return  $this->languages->languages();
        // return Cache::rememberForever('languages', function () {
        //     return  $this->languages->languages();
        // });
    }


    public function getActors()
    {

        Cache::put('actors', $this->actors->actors('500'));
        // return Cache::rememberForever('actors', function () {
        //     return  $this->actors->actors('500');
        // });
    }












    // private function popular()
    // {
    //     return Cache::get('movies-popular');
    // }

    // private function upcoming()
    // {
    //     return Cache::get('movies-upcoming');
    // }

    // private function toprated()
    // {
    //     return Cache::get('movies-toprated');
    // }

    // private function trending()
    // {
    //     return Cache::get('movies-trending');
    // }

    // private function nowplaying()
    // {
    //     return Cache::get('movies-nowplaying');
    // }






    public function movies()
    {  
        
       
        $merged = Cache::get('movies-nowplaying')->merge(Cache::get('movies-upcoming'));
        $merged = $merged->merge(Cache::get('movies-trending'));
        $merged = $merged->merge(Cache::get('movies-popular'));
        $merged = $merged->merge(Cache::get('movies-toprated'));
        $movies =  MovieModel::all()->pluck('id')->toArray();
        // dump(count($movies));
        foreach (array_chunk($this->formatData($merged, 'movie')->unique('id')->toArray(), 1000) as $t) {
            collect($t)->map(function ($movie) use ($movies) {
                if (!in_array($movie['id'], $movies)) {
                    MovieModel::create($movie);
                }
            });
        }
      
    }


    public function topRated()
    {
        $movies =  $this->formatData(Cache::get('movies-toprated'), 'movie');
        $tv =  $this->formatData(Cache::get('tv-toprated'), 'tv');
        $merged =  $movies->merge($tv);

        $movies =  TopRated::all()->pluck('id')->toArray();
        foreach (array_chunk($merged->unique('id')->toArray(), 1000) as $t) {
            collect($t)->map(function ($movie) use ($movies) {
                if (!in_array($movie['id'], $movies)) {
                    TopRated::create($movie);
                }
            });
        }

    }



    public function tv()
    {


        $merged = Cache::get('tv-trending')->merge(Cache::get('tv-popular'));
        $merged = $merged->merge(Cache::get('tv-onair'));
        $merged = $merged->merge(Cache::get('tv-airingtoday'));
        $merged = $merged->merge(Cache::get('tv-toprated'));
        $tvs =  TvModel::all()->pluck('id')->toArray();

        foreach (array_chunk($this->formatData($merged, 'tv')->unique('id')->toArray(), 1000) as $t) {
            collect($t)->map(function ($tv) use ($tvs) {
                if (!in_array($tv['id'], $tvs)) {
                    TvModel::create($tv);
                }
            });
        }
        // foreach (array_chunk($this->formatData($merged, 'movie')->unique('id')->toArray(), 1000) as $t) {
        //     MovieModel::insert($t);
        // }

    }












   
    public function actors()
    {
          
        $actors =   Cache::get('actors');
        $actormodel = ActorModel::all()->pluck('id')->toArray();

        $data = $actors->map(function ($actor) {
            return collect($actor)->merge([
                'profile_path' => $actor['profile_path']
                    ? 'https://image.tmdb.org/t/p/w235_and_h235_face' . $actor['profile_path']
                    : 'https://ui-avatars.com/api/?size=235&name=' . $actor['name'],
                'known_for' => collect($actor['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                    collect($actor['known_for'])->where('media_type', 'tv')->pluck('name')
                )->implode(', '),
            ])->only([
                'name', 'id', 'profile_path', 'known_for',
            ])->put('slug',  Str::of($actor['name'])->slug('-'));
        });

        foreach (array_chunk($data->unique('id')->toArray(), 1000) as $t) {
            collect($t)->map(function ($actor) use ($actormodel) {
                if (!in_array($actor['id'], $actormodel)) {
                    ActorModel::create($actor);
                }
            });
        }
        //ActorModel::insert($data->toArray());

    }
}
