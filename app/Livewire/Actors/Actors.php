<?php

namespace App\Livewire\Actors;

use App\Models\ActorModel;
use Livewire\Component;

class Actors extends Component
{
    public $search;
    public $itemsPerPage = 25;

    public function loadMore()
    {
        $this->itemsPerPage += 25;
    }


    public function render()
    {
        
        $popularActors = ActorModel::when($this->search, function ($e) {
                return $e
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('known_for', 'like', '%' . $this->search . '%');
            })->take($this->itemsPerPage)->get();

        return view('livewire.actors.actors',['popularActors'=> $popularActors] );
    }
}
