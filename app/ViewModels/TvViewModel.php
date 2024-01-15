<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;
use Illuminate\Support\Facades\Cache;

class TvViewModel extends ViewModel
{

    // public $popularTv;
    // public $topRatedTv;
    // public $trending_tv;
    // public $genres;

    // public function __construct($popularTv = null, $topRatedTv = null, $genres = null, $trending_tv = null)
    // {
    //     $this->topRatedTv = $topRatedTv;
    //     $this->popularTv = $popularTv;
    //     $this->trending_tv = $trending_tv;
    //     $this->genres = $genres;
    // }

    public function popularTv()
    {
        return $this->formatTv(Cache::get('tv-popular'));
       
    }

    public function topRatedTv()
    {
     return $this->formatTv(Cache::get('tv-toprated')) ;
    }
    public function trending()
    {
        return $this->formatTv(Cache::get('tv-trending'));
    }
    public function genres()
    {
        return collect(Cache::get('tv-genre'))->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    private function formatTv($tv)
    {

       
        return collect($tv)->map(function ($tvshow) {
            $genresFormatted = collect($tvshow['genre_ids'])->mapWithKeys(function ($value) {
                return [$value => $this->genres()->get($value)];
            })->implode(', ');

            return collect($tvshow)->merge([
                'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $tvshow['poster_path'],
                'backdrop_path' => $tvshow['backdrop_path'],
                'vote_average' => round($tvshow['vote_average'], 1),
                'first_air_date' => Carbon::parse($tvshow['first_air_date'])->format('M d, Y'),
                'genres' => $genresFormatted,
            ])->only([
                'poster_path', 'id', 'media_type', 'genre_ids','logo', 'name', 'vote_average', 'overview', 'first_air_date', 'genres','backdrop_path'
            ])->put('slug',  Str::of( $tvshow['name'])->slug('-'));
        });
    }
}
