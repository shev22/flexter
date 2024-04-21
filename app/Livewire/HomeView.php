<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\FormatDataTrait;
use App\Livewire\Traits\MediaTrait;

class HomeView extends Component
{
    use FormatDataTrait;
    use MediaTrait;

    public $popular;
    public $trending;
    public $upcoming;
    public $nowPlayingMovies;

    public $airingToday;
    public $onair;
    public $popularTv;


    public function mount()
    {
     
        $this->trending = $this->formatData(Cache::get('all-trending'), '');
        $this->popular = $this->formatData(Cache::get('movies-popular')->take(30), 'movie');
        $this->upcoming = $this->formatData(Cache::get('movies-upcoming')->take(30), 'movie');
        $this->nowPlayingMovies = $this->formatData(Cache::get('movies-nowplaying')->take(50), 'movie');

        $this->airingToday = $this->formatData(Cache::get('tv-airingtoday'), 'tv');
        $this->onair = $this->formatData(Cache::get('tv-onair')->take(30), 'tv');
        $this->popularTv = $this->formatData(Cache::get('tv-popular')->take(30), 'tv');
     
    }

    public function genres()
    {
        return $this->getGenres(Cache::get('movies-genre'));
    }

    public function wishlist($movie)
    {
    
        $this->wish_list($movie);
    }

    public function isWishListed($id)
    {
        return $this->is_WishListed($id);
    }


    public function render()
    {
        // $trending = $this->formatData(Cache::get('all-trending'), '');
        // $popular = $this->formatData(Cache::get('movies-popular')->take(28), 'movie');
        // $upcoming = $this->formatData(Cache::get('movies-upcoming')->take(12), 'movie');
        // $nowPlayingMovies = $this->formatData(Cache::get('movies-nowplaying')->take(50), 'movie');

        // $airingToday = $this->formatData(Cache::get('tv-airingtoday'), 'tv');
        // $onair = $this->formatData(Cache::get('tv-onair')->take(28), 'tv');
        // $popularTv = $this->formatData(Cache::get('tv-popular')->take(12), 'tv');






        return view('livewire.home-view');
    }
}
