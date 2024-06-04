<?php

namespace App\Livewire\Actors;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class Filmography extends Component
{

    public $genres;
    public $imdb  = false;
    public $movie = false;
    public $tv    = false;
    public $Bypopular = false;
    public $itemsPerPage = 25;


    public function loadMore()
    {
        $this->itemsPerPage += 10;
    }

    public function mount($genres)
    {

        $this->genres = $genres;
    }


    public function movies()
    {
        if ($this->movie == true) {

            $this->movie = false;
        } else {
            $this->tv = false;
            $this->movie = true;
        }
    }

    public function tvs()
    {
        if ($this->tv == true) {

            $this->tv = false;
        } else {
            $this->movie = false;
            $this->tv = true;
        }
    }

    public function rating()
    {
        if ($this->imdb == true) {

            $this->imdb = false;
        } else {
            $this->Bypopular = false;
            $this->imdb = true;
        }
    }

    public function popular()
    {
        if ($this->Bypopular == true) {

            $this->Bypopular = false;
        } else {
            $this->imdb = false;
            $this->Bypopular = true;
        }
    }


    public function render()
    {


        $movies = Cache::get('knownForMovies')->when($this->movie, function ($e) {
            return $e->where('media_type', 'movie');
        })->when($this->tv, function ($e) {
            return $e->where('media_type', 'tv');
        })->when($this->imdb, function ($e) {
            return  $e->sortBy('vote_average', SORT_REGULAR, true);
        })->when($this->Bypopular, function ($e) {
            return  $e->sortBy('popularity', SORT_REGULAR, true);
        })->take($this->itemsPerPage);


        return view('livewire.actors.filmography', ['movies' => $movies]);
    }
}
