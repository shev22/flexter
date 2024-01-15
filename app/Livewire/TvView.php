<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class TvView extends Component
{
    use WithPagination;
    public $popular;

    public function mount($popularTv)
    {
        $this->popular = $popularTv;
    }





    public function render()
    {
        return view('livewire.tv-view',['popularTv'=> $this->popular->paginate(14)]);
    }
}




