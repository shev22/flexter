<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeTvSection extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $airingToday, public $onair, public $trending)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home-tv-section');
    }
}
