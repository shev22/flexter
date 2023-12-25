<?php

namespace App\ViewModels;

use Carbon\Carbon;
use Spatie\ViewModels\ViewModel;

class TvShowViewModel extends ViewModel
{
    public $tvshow;
    public $related;

    public function __construct($tvshow, $related)
    {
        $this->tvshow = $tvshow;
        $this->related = $related;
    }
    

    public function tvshow()
    {
        // dd(  $this->tvshow );
        return collect($this->tvshow)->merge([
            'poster_path' => $this->tvshow['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/'.$this->tvshow['poster_path']
                : 'https://via.placeholder.com/500x750',

                'vote_average' => round( $this->tvshow['vote_average'], 1),
            'first_air_date' => Carbon::parse($this->tvshow['first_air_date'])->format('M d, Y'),
            'genres' => collect($this->tvshow['genres'])->pluck('name')->flatten()->implode(', '),
            // 'cast' => collect($this->tvshow['credits']['cast'])->take(5)->map(function($cast) {
            //     return collect($cast)->merge([
            //         'profile_path' => $cast['profile_path']
            //             ? 'https://image.tmdb.org/t/p/w300'.$cast['profile_path']
            //             : 'https://via.placeholder.com/300x450',
            //     ]);
            // }),
            'cast' => collect($this->tvshow['credits']['cast'])->take(10)->pluck('name')->flatten()->implode(', '),
            'images' =>$this->tvshow['images']['backdrops'] ? collect($this->tvshow['images']['backdrops'])->take(20) : [],
        ])->only([
            'poster_path', 'id', 'genres', 'name', 'vote_average', 'overview', 'first_air_date', 'credits' ,
            'videos', 'images', 'crew', 'cast', 'images', 'created_by','seasons'
        ]);
    }

    
    public function related()
    {
    //    dd($this->related);

        return collect($this->related)->map(function ($tv){
            return collect($tv)->merge([
                'poster_path' => $tv['poster_path']
                    ? 'https://image.tmdb.org/t/p/w500/' . $tv['poster_path']
                    : 'https://via.placeholder.com/500x750',
                'vote_average' => round($tv['vote_average'], 1),
                'release_date' => Carbon::parse($tv['first_air_date'])->format('M d, Y'),
            ])->only([
                'poster_path', 'id', 'name', 'vote_average', 'overview', 'release_date'
            ]);
        });
    }
}
