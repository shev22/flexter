<?php

namespace App\Livewire;


use Livewire\Component;


class MoviesView extends Component
{
    public $display = '';


    public function popular()
    {
       $this->display = 'popular';
     
    }

    public function nowplaying()
    {
       $this->display = 'nowplaying';
     
    }  

    



    
    public function render()
    {
        return view('livewire.movies-view');
    }
}
