<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Traits\MediaTrait;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\FormatDataTrait;
use App\Models\TopRated as ModelsTopRated;
use Livewire\WithPagination;

class TopRated extends Component
{
    use MediaTrait;
    use WithPagination;
    use FormatDataTrait;

    public $itemsPerPage = 25;
    public $popularity = false;
    public $latest     = false;
    public $showmovies;
    public $showtv;
    public $eighties;
    public $seventies;
    public $earlier;
    public $sortByImdb;
    public $language    = [];
    public $sortByGenre = [];
    public $sortByYears = [];

    public function loadMore()
    {
        $this->itemsPerPage += 20;
    }
    public function genres()
    {
        $movie_genre = $this->getGenres(Cache::get('movies-genre'));
        $tv_genre = $this->getGenres(Cache::get('tv-genre'));
        $genre =  $movie_genre->union($tv_genre);
        return ($genre);
    }

    public function languages()
    {
        return $this->getLanguages();
    }

    public function wishlist($movie)
    {
        $this->wish_list($movie);
    }

    public function isWishListed($id)
    {
        return $this->is_WishListed($id);
    }


    public function filterByPopularity()
    {
        if ($this->popularity == true) {

            $this->popularity = false;
        } else {
            $this->popularity = true;
            $this->latest = false;
        }
    }

    public function filterByLatest()
    {
        if ($this->latest == true) {

            $this->latest = false;
        } else {
            $this->latest = true;
            $this->popularity = false;
        }
    }

    public function updateShowmovies()
    {
        $this->showmovies = true;
        $this->showtv = false;
    }

    public function updateShowtv()
    {

        $this->showtv = true;
        $this->showmovies = false;
    }




    public function render()
    {


        $movies = ModelsTopRated::when($this->showmovies == true, function ($e) {
            $this->showtv = false;
            $e->where('media_type', 'movie');
        })
            ->when($this->showtv == true, function ($e) {
                $this->showmovies == false;
                $e->where('media_type', 'tv');
            })

            ->when($this->sortByImdb, function ($e) {
            })

            ->when($this->sortByImdb, function ($e) {

                $e->when($this->sortByImdb == 'acending', function ($e2) {

                    $e2->orderBy('vote_average', 'DESC');
                });
                $e->when($this->sortByImdb == 'decending', function ($e2) {

                    $e2->orderBy('vote_average', 'asc');
                });
                $e->when($this->sortByImdb == 'normal', function ($e2) {
                    $this->sortByImdb = null;
                });
            })


            /**
             * Sort by years
             */
            ->when($this->sortByYears, function ($e) {

                $e->whereIn('year', $this->sortByYears);
            })

            ->when($this->latest, function ($e) {
                $e->orderBy('year', 'DESC');
            })

            ->when($this->earlier, function ($e) {
                $e->where('year', '<', 1970);
            })


            ->when($this->popularity, function ($e) {
                $e->orderBy('popularity', 'DESC');
            })
            ->when($this->latest, function ($e) {
                $e->orderBy('year', 'DESC');
            })

            ->when($this->language, function ($e) {
                $e->whereIn('original_language', $this->language);
            })

            ->when(($this->sortByGenre), function ($query) {

                $query->whereHas('genre', function ($q) {
                    $q->whereIn('genre_id', $this->sortByGenre);
                });
            })
            ->take($this->itemsPerPage)->get();

        return view('livewire.top-rated', ['movies' => $movies]);
    }
}
