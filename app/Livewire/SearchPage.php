<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Traits\SearchTrait;

class SearchPage extends Component
{
    use SearchTrait;

    public $query;

    public function mount($query)
    {
        $this->query = $query;
    }

    public function wishlist($movie)
    {
        $this->wish_list($movie);
    }

    public function isWishListed($id)
    {
        return $this->is_WishListed($id);
    }

    public function render()
    {
        return view('livewire.search-page', ['SearchResult' => collect($this->search($this->query))]);
    }
}
