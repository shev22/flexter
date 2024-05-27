<?php

/**
 * 05.02.2024 11:20pm
 * Francis Okoroafor
 */

namespace App\Livewire\Traits;

use App\Models\WishListModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;


trait MediaTrait
{
    public function getGenres($data)
    {
        return collect($data)->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function getLanguages()
    {
        return Cache::get('languages');
    }



    public function wish_list($movie)
    {
     

        if (Auth::check()) {
            $movie['user_id'] = Auth::id();
            $result = WishListModel::where('id', $movie['id'])->where('user_id', Auth::id())->first();


            if (!$result) {
                WishListModel::create($movie);
            } else {
                $result->delete();
            }
        }
    }

    public function is_WishListed($id)
    {
        if (Auth::check()) {
            if (WishListModel::where('id', $id)->where('user_id', Auth::id())->first()) {
                return true;
            } else {
                return false;
            }
        }
    }
}
