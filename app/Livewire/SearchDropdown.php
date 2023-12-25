<?php

namespace App\Livewire;

use Livewire\Component;

class SearchDropdown extends Component
{

    use SearchTrait;
    public $query = '';


    public function searchQuery()
    {


       
        $query = 1;
        // $this->redirectRoute('search', ['query' => $this->query]);

        // $this->redirect(SearchPage::class, ['query' => $query]);

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
