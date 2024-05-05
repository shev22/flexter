<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Traits\SearchTrait;
use Illuminate\Support\Facades\Cache;

class SearchPage extends Component
{
    use SearchTrait;

    public $query;
    public $showmovies;
    public $showtv;
    public $showactors;
    public $itemsPerPage = 25;

    public function mount($query)
    {
        $this->query = $query;
    }



    public function loadMore()
    {
        $this->itemsPerPage += 20;
    }

    public function updateShowmovies()
    {

        $this->showmovies = true;
        $this->showtv = false;
        $this->showactors = false;
    }

    public function updateShowtv()
    {

        $this->showtv = true;
        $this->showmovies = false;
        $this->showactors = false;
    }

    public function updateShowactors()
    {
        $this->showactors = true;
        $this->showtv = false;
        $this->showmovies = false;
    }


    public function render()
    {
        if (empty($this->query)) {
            Cache::forget('seach-results');
        } else {
            Cache::put('seach-results', collect($this->search($this->query)));
            $results = Cache::get('seach-results')->when($this->showmovies == true, function ($e) {
                $this->showtv = false;
                $this->showactors = false;
                return $e->where('media_type', 'movie');
            })
                ->when($this->showtv == true, function ($e) {
                    $this->showmovies = false;
                    $this->showactors = false;
                    return  $e->where('media_type', 'tv');
                })
                ->when($this->showactors == true, function ($e) {
                    $this->showmovies = false;
                    $this->showtv = false;
                    return  $e->where('media_type', 'person');
                })->take($this->itemsPerPage);
        }

        return view('livewire.search-page', ['SearchResult' =>  $results ?? []]);
    }
}
