<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Traits\SearchTrait;

class SearchDropdown extends Component
{

    use SearchTrait;
    public $query = '';


    public function searchQuery()
    {
        return redirect()->route('search', ['query' => $this->query]);
    }

    public function render()
    {
        // dump( $searchResults);
        return view('livewire.search-dropdown', [
            'searchResults' => collect($this->search($this->query))->take(7),
        ]);
    }
}
