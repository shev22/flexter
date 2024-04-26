<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;
use App\Livewire\Traits\MediaTrait;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\FormatDataTrait;

class ActorViewModel extends ViewModel
{
    use MediaTrait;
    use FormatDataTrait;
    public $actor;
    public $social;
    public $credits;

    public function __construct($actor, $social, $credits)
    {
        $this->actor = $actor;
        $this->social = $social;
        $this->credits = $credits;
    }


    public function genres()
    {
        return $this->getGenres(Cache::get('movies-genre'));
    }


    public function actor()
    {
        return collect($this->actor)->merge([
            'birthday' => Carbon::parse($this->actor['birthday'])->format('M d, Y'),
            'age' => Carbon::parse($this->actor['birthday'])->age,
            'profile_path' => $this->actor['profile_path']
                ? 'https://image.tmdb.org/t/p/h632/'.$this->actor['profile_path']
                : 'https://via.placeholder.com/300x450',
        ])->only([
            'birthday', 'age', 'profile_path', 'name', 'id', 'homepage', 'place_of_birth', 'biography'
        ]);
    }



    public function social()
    {
       
        return collect($this->social)->merge([
            'twitter' => $this->social['twitter_id'] ? 'https://twitter.com/'.$this->social['twitter_id'] : null,
            'facebook' => $this->social['facebook_id'] ? 'https://facebook.com/'.$this->social['facebook_id'] : null,
            'instagram' => $this->social['instagram_id'] ? 'https://instagram.com/'.$this->social['instagram_id'] : null,
        ])->only([
            'facebook', 'instagram', 'twitter',
        ]);
    }

    public function knownForMovies()
    {
        $castMovies = collect($this->credits)->get('cast');
      //  dd(  $castMovies);

        return collect($castMovies)->sortByDesc('vote_average')->map(function($movie) {
            if (isset($movie['title'])) {
                $title = $movie['title'];
            } elseif (isset($movie['name'])) {
                $title = $movie['name'];
            } else {
                $title = 'Untitled';
            }

            if (isset($movie['release_date'])) {
                $release_date = $movie['release_date'];
            } elseif (isset($movie['first_air_date'])) {
                $release_date = $movie['first_air_date'];
            } else {
                $release_date = 'Untitled';
            }

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w500'.$movie['poster_path']
                    : 'https://via.placeholder.com/185x278',
                'title' => $title,
                "release_date" =>  $release_date,
                'linkToPage' => $movie['media_type'] === 'movie' ? route('movie.show', ['slug'=>  Str::of($title)->slug('-'), 'id'=>$movie['id']]) : route('tv.show',  ['slug'=> Str::of( $title)->slug('-'), 'id'=>$movie['id']])
            ]);



        });
    }


    // public function credits()
    // {
    //     $castMovies = collect($this->credits)->get('cast');
    //     // dd(  $castMovies);
    //     return collect($castMovies)->map(function($movie) {
    //         if (isset($movie['release_date'])) {
    //             $releaseDate = $movie['release_date'];
    //         } elseif (isset($movie['first_air_date'])) {
    //             $releaseDate = $movie['first_air_date'];
    //         } else {
    //             $releaseDate = '';
    //         }

    //         if (isset($movie['title'])) {
    //             $title = $movie['title'];
    //         } elseif (isset($movie['name'])) {
    //             $title = $movie['name'];
    //         } else {
    //             $title = 'Untitled';
    //         }

    //         return collect($movie)->merge([
    //             'release_date' => $releaseDate,
    //             'release_year' => isset($releaseDate) ? Carbon::parse($releaseDate)->format('Y') : 'Future',
    //             'title' => $title,
    //             'character' => isset($movie['character']) ? $movie['character'] : '',
    //             'linkToPage' => $movie['media_type'] === 'movie' ? route('movie.show', ['slug'=>  Str::of($title)->slug('-'), 'id'=>$movie['id']]) : route('tv.show',  ['slug'=> Str::of( $title)->slug('-'), 'id'=>$movie['id']])
    //         ])->only([
    //             'release_date', 'release_year', 'title', 'character', 'linkToPage',
    //         ]);
    //     })->sortByDesc('release_date');
    // }
}
