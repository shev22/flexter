<?php

namespace App\Livewire;

use Livewire\Component;

class SearchPage extends Component
{
    use SearchTrait;

    public $query;

    public function mount($query)
    {
        $this->query = $query;
    }

    public function render()
    {
        return view('livewire.search-page', ['SearchResult' => collect($this->search($this->query))]);
    }
}
