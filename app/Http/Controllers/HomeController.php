<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Livewire\Traits\MediaTrait;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\FormatDataTrait;

class HomeController extends Controller
{
    use FormatDataTrait;
    use MediaTrait;
    public function index()
    {   
        $movies = [];
        $trending = [];
        $repositories =  Settings::where('config_block_id', 2)->first();
        $data = json_decode($repositories->config_data);


        $trending = $this->formatData(Cache::get('all-trending') ? Cache::get('all-trending') : [], '');
        $movies['movie']['popular '] = $this->formatData(Cache::get('movies-popular') ? Cache::get('movies-popular')->take($data[2]->pages) : [], 'movie');
        $movies['movie']['upcoming ']= $this->formatData(Cache::get('movies-upcoming') ? Cache::get('movies-upcoming')->take($data[4]->pages) : [], 'movie');
        $movies['movie']['nowplayingmovies '] = $this->formatData(Cache::get('movies-nowplaying') ? Cache::get('movies-nowplaying')->take($data[5]->pages) : [], 'movie');
        $movies['tv']['airingtoday ']= $this->formatData(Cache::get('tv-airingtoday') ? Cache::get('tv-airingtoday')->take($data[3]->pages) : [], 'tv');
        $movies['tv']['onair ']= $this->formatData(Cache::get('tv-onair') ? Cache::get('tv-onair')->take($data[0]->pages) : [], 'tv');
        $movies['tv']['populartv ']= $this->formatData(Cache::get('tv-popular') ? Cache::get('tv-popular')->take($data[1]->pages) : [], 'tv');

        Cache::put('home-movies', $movies);
    
        return view('index', ['trending'=> $trending]);
    }

}
