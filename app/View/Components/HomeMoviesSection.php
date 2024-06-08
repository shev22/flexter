<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeMoviesSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $nowPlaying, public $trending, public $upcoming)
    {
   
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-movies-section');
    }
}
