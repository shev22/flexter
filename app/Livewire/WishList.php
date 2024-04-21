<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WishListModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


class WishList extends Component
{
    public $itemsPerPage = 50;
   

    public function loadMore()
    {
        $this->itemsPerPage +=20;
    }

    public function genres()
    {
        return collect(Cache::get('movies-genre'))->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function wishlist($movie)
    {
        if (Auth::check()) {
            $result = WishListModel::where('id', $movie['id'])->where('user_id', Auth::id())->first();

            if ($result) {
                $result->delete();
            }
        }
    }
    

    public function render()
    {
        return view('livewire.wish-list',['wishlist'=>WishListModel::where('user_id', Auth::id())->get()]);
    }
}
