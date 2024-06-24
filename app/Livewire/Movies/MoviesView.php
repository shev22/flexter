<?php

namespace App\Livewire\Movies;

use Livewire\Component;
use App\Models\MovieModel;
use App\Livewire\Traits\MediaTrait;
use Illuminate\Support\Facades\Cache;

class MoviesView extends Component
{
    use MediaTrait;


    public $itemsPerPage = 25;
    public $popularity = false;
    public $latest     = false;
    public $search;

    public $earlier;
    public $sortByImdb;
    public $language    = [];
    public $sortByGenre = [];
    public $sortByYears = [];




    public function loadMore()
    {
        $this->itemsPerPage += 30;
    }
    public function genres()
    {
        return $this->getGenres(Cache::get('movies-genre'));
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














    public function render()
    {



        $movies = MovieModel::when($this->sortByImdb, function ($e) {

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
                $e->whereIn('year', $this->sortByYears)
                ->when($this->earlier, function($e){
                    $e->orWhere('year','<', 1990);
                });
            })

        
            ->when($this->earlier, function ($e) {
                $e->where('year','<', 1990);
            })

            ->when($this->latest, function ($e) {
                $e->orderBy('year', 'DESC');
            })

            ->when($this->popularity, function ($e) {
                $e->orderBy('popularity', 'DESC');
            })
            ->when($this->latest, function ($e) {
                $e->orderBy('year', 'DESC');
            })
            ->when($this->search, function ($e) {
                $e->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('year', 'like', '%' . $this->search . '%');
              
            })
            ->when($this->language, function ($e) {
                $e->whereIn('original_language', $this->language);
            })

            ->when(($this->sortByGenre), function ($query) {

                $query->whereHas('genre', function ($q) {
                    $q->whereIn('genre_id', $this->sortByGenre);
                });
            })
            ->orderBy('created_at', 'desc') ->take($this->itemsPerPage)->get();

            //   dd(Cache::get('movies-popular'));
        return view('livewire.movies.movies-view', ['movies' => $movies]);
    }
}
