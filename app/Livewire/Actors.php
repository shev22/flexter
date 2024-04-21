<?php

namespace App\Livewire;

use App\Models\ActorModel;
use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cache;

class Actors extends Component
{
    public $search;
    public $itemsPerPage = 25;

    public function loadMore()
    {
        $this->itemsPerPage += 10;
    }


    public function render()
    {
        // $cachedData = (Cache::get('actors'))

        // ->when($this->search, function ($e) {
        //     return $e
        //     ->where('name', 'like', '%' . $this->search . '%')
        //     ->orWhere('known_for', 'like', '%' . $this->search . '%');
        // });
        // $popularActors = collect(Cache::get('actors'))->take($this->itemsPerPage)->map(function($actor) {
        //     return collect($actor)->merge([
        //         'profile_path' => $actor['profile_path']
        //             ? 'https://image.tmdb.org/t/p/w235_and_h235_face'.$actor['profile_path']
        //             : 'https://ui-avatars.com/api/?size=235&name='.$actor['name'],
        //         'known_for' => collect($actor['known_for'])->where('media_type', 'movie')->pluck('title')->union(
        //             collect($actor['known_for'])->where('media_type', 'tv')->pluck('name')
        //         )->implode(', '),
        //     ])->only([
        //         'name', 'id', 'profile_path', 'known_for',
        //     ])->put('slug',  Str::of($actor['name'])->slug('-'));
        // })    ->when($this->search, function ($e) {
        //     return $e
        //     // ->where('name', 'like', '%' . $this->search . '%');
        //     // ->orWhere('known_for', 'like', '%' . $this->search . '%');

        //     ->filter(function($item){
        //         return stripos($item['name'], $this->search) !== false;
        //         // return count(array_intersect($this->search, $item['genre_ids'])) > 0;
        //     });
        // });;



        $popularActors = ActorModel::when($this->search, function ($e) {
                return $e
                ->where('name', 'like', '%' . $this->search . '%')
                ->orWhere('known_for', 'like', '%' . $this->search . '%');
            })->take($this->itemsPerPage)->get();


        


        return view('livewire.actors',['popularActors'=> $popularActors] );
    }
}
