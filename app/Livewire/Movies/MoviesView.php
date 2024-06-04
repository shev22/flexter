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

          
  
            // ->when($this->eighties, function ($e) {
            //     $e->whereBetween('year', [1980, 1989]);
            // })
            // ->when($this->seventies, function ($e) {
            //     $e->whereBetween('year', [1970, 1979]);
            // })
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




            ->when($this->sortByGenre, function ($e) {
             
                // $e->get()->each(function ( $item, int $key) use($e){
             //  dd($this->sortByGenre);
                     
// dd( $item['genre_ids']);



                            // foreach($e as $genre)
                            // {
                            // foreach($this->sortByGenre as $item)
                            // {
                            //    // $e->orWhereJsonContains('genre_ids', $genre);

                            //    if()
                            //    {

                            //    }
                            // }
                            //  }
                            // foreach ($e as $value) {

                            //     dd($value);
                                // if (count(array_intersect($this->sortByGenre, $value['genre_ids'])) > 0) {
                                //    return $value;
                                // }
                            // }

                   

// return $e->genre_ids;
                // });

                $e->whereJsonContains('genre_ids->genre', $this->sortByGenre);

            //   $e->each(function($img)  {
            //     if (count(array_intersect($this->sortByGenre, json_decode($img['genre_ids'])->genre)) > 0) {
            //            $img->get();
            //         }
            //  });





            })
            ->take($this->itemsPerPage)->get();

            //  dd($movies);
        return view('livewire.movies.movies-view', ['movies' => $movies]);
    }
}
