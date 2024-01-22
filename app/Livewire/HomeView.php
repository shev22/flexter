<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Movies\TrendingMovies;

class HomeView extends Component
{
    private function releaseDate($mediaType, $array)
    {
       if($mediaType == 'movie')
       {
         return Carbon::parse($array['release_date'])->format('M d, Y');
       }else{
        return Carbon::parse($array['first_air_date'])->format('M d, Y');
       }
    }




    public function render()
    {
         
        $cachedData= Cache::get('all-trending');
   


    $trending = (collect($cachedData))  
        ->map(function ($cachedData) {
        return collect($cachedData)->merge([
             'title'=> $cachedData['media_type'] == 'movie' ? $cachedData['title'] : $cachedData['name'],
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $cachedData['poster_path'],
            'backdrop_path' => $cachedData['backdrop_path'],
            'vote_average' => round($cachedData['vote_average'], 1),
            'release_date' => $this->releaseDate($cachedData['media_type'], $cachedData),
        ])->only([
            'poster_path', 'id', 'genre_ids','name','title', 'vote_average', 'logo', 'overview', 'first_air_date', 'release_date', 'genres', 'media_type', 'backdrop_path'
        ])->put('slug',  Str::of($cachedData['media_type'] == 'movie' ? $cachedData['title'] : $cachedData['name'])->slug('-'));
    }) ;


        return view('livewire.home-view', ['trending'=> $trending]);
    }
}
