<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\MediaTrait;


class HomeView extends Component
{
    use MediaTrait;

    // public $movies = true;
    public $trending;
    // public $tv = false;


    public function mount($trending)
    {
        $this->trending = $trending;
    }

    public function genres()
    {
        $movie_genre = $this->getGenres(Cache::get('movies-genre'));
        $tv_genre = $this->getGenres(Cache::get('tv-genre'));
        $genre =  $movie_genre->union($tv_genre);
        return ($genre);
    }

    public function wishlist($movie)
    {
        $this->wish_list($movie);
    }



    public function isWishListed($id)
    {
        return $this->is_WishListed($id);
    }

    // public function showmovies()
    // {
    //     $this->tv = false;
    //     $this->movies = true;
    // }

    // public function showtv()
    // {
    //     $this->movies = false;
    //     $this->tv = true;
    // }

    public function render()
    {
        // $media = [];
        // if ($this->movies) {
        //     $this->tv = false;
        //     $media['movies'] = collect(Cache::get('home-movies'))->get('movie');
        // } elseif ($this->tv) {
        //     $this->movies = false;

        //     $media['series'] = collect(Cache::get('home-movies'))->get('tv');
        // }
        //  dd(  collect(Cache::get('home-movies'))->get('movie'));

        return view('livewire.home-view', ['media' => Cache::get('home-movies')]);
    }
}
