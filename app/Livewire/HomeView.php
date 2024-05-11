<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Settings;
use App\Livewire\Traits\MediaTrait;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\FormatDataTrait;

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
        $repositories =  Settings::where('config_block_id', 2)->first();
        $data = json_decode($repositories->config_data);


        $this->trending = $this->formatData(Cache::get('all-trending') ? Cache::get('all-trending') : [], '');
        $this->popular = $this->formatData(Cache::get('movies-popular') ? Cache::get('movies-popular')->take($data[2]->pages) : [], 'movie');
        $this->upcoming = $this->formatData(Cache::get('movies-upcoming') ? Cache::get('movies-upcoming')->take($data[4]->pages) : [], 'movie');
        $this->nowPlayingMovies = $this->formatData(Cache::get('movies-nowplaying') ? Cache::get('movies-nowplaying')->take($data[5]->pages) : [], 'movie');
        $this->airingToday = $this->formatData(Cache::get('tv-airingtoday') ? Cache::get('tv-airingtoday') : [], 'tv');
        $this->onair = $this->formatData(Cache::get('tv-onair') ? Cache::get('tv-onair')->take($data[0]->pages) : [], 'tv');
        $this->popularTv = $this->formatData(Cache::get('tv-popular') ? Cache::get('tv-popular')->take($data[1]->pages) : [], 'tv');
        






















        // $this->popular = $this->formatData(Cache::get('movies-popular')?->take(30), 'movie');
        // $this->upcoming = $this->formatData(Cache::get('movies-upcoming')?->take(30), 'movie');
        // $this->nowPlayingMovies = $this->formatData(Cache::get('movies-nowplaying')?->take(50), 'movie');

        // $this->airingToday = $this->formatData(Cache::get('tv-airingtoday'), 'tv');
        // $this->onair = $this->formatData(Cache::get('tv-onair')?->take(30), 'tv');
        // $this->popularTv = $this->formatData(Cache::get('tv-popular')?->take(30), 'tv');

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
