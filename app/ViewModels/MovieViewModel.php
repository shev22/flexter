<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\ViewModels\ViewModel;


class MovieViewModel extends ViewModel
{
  

    public $movie;
    public $related;

    public function __construct($movie, $related)
    {
        
        $this->movie = $movie;
        $this->related = $related;
    }



    public function movie()
    {
        
        return collect($this->movie)->merge([
            'poster_path' => $this->movie['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/' . $this->movie['poster_path']
                : 'https://via.placeholder.com/500x750',

            'vote_average' => round($this->movie['vote_average'], 1),
            'release_date' => Carbon::parse($this->movie['release_date'])->format('M d, Y'),
            'genres' => collect($this->movie['genres'])->pluck('name')->flatten()->implode(', '),
            'crew' => collect($this->movie['credits']['crew'])->take(3),
            // 'cast' => collect($this->movie['credits']['cast'])->take(10)->map(function($cast) {
            //     return collect($cast)->merge([
            //         'profile_path' => $cast['profile_path']
            //             ? 'https://image.tmdb.org/t/p/w300'.$cast['profile_path']
            //             : 'https://via.placeholder.com/300x450',
            //     ]);
            // }),
            'cast' => collect($this->movie['credits']['cast'])->take(10)->pluck('name')->flatten()->implode(', '),
            'images' => $this->movie['images']['backdrops'] ? collect($this->movie['images']['backdrops'])->take(20) : [],
        
        ])->only([
            'poster_path', 'id', 'genres', 'title', 'vote_average', 'overview', 'release_date', 'credits',
            'videos', 'images', 'crew', 'images', 'runtime', 'imdb_id', 'cast'
        ])->put('slug',  Str::of( $this->movie['title'])->slug('-'));
    }

    public function related()
    {
        // dd($this->related);

        return collect($this->related)->map(function ($movie) {

            return collect($movie)->merge([
                'poster_path' => $movie['poster_path']
                    ? 'https://image.tmdb.org/t/p/w500/' . $movie['poster_path']
                    : 'https://via.placeholder.com/500x750',

                'vote_average' => round($movie['vote_average'], 1),
                'release_date' => Carbon::parse($movie['release_date'])->format('M d, Y'),
               

            ])->only([
                'poster_path', 'id', 'title', 'vote_average', 'overview', 'release_date'

            ]);
        });
    }
}
