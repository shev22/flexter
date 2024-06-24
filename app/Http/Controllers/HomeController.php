<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;
use App\Livewire\Traits\MediaTrait;
use Illuminate\Support\Facades\Cache;
use App\Livewire\Traits\FormatDataTrait;
use App\Http\Controllers\Services\MediaService;

class HomeController extends Controller
{
    use FormatDataTrait;
    use MediaTrait;
    public function __construct(
        private MediaService $buffer,
    ) {
    }
    public function index()
    {
        
        
          $this->buffer->movies();


        // //  dd($this->formatData(Cache::get('movies-toprated'), 'movie'));
        $this->buffer->movies();
        $movies = [];
        $trending = [];
        $repositories =  Settings::where('config_block_id', 2)->first();
        $data = json_decode($repositories->config_data);


        $trending = $this->formatData(Cache::get('all-trending') ? Cache::get('all-trending') : [], '');
        $movies['movie']['trending '] = $this->formatData(Cache::get('movies-trending') ? collect(Cache::get('movies-trending'))->take($data[2]->pages) : [], 'movie');
        $movies['movie']['upcoming '] = $this->formatData(Cache::get('movies-upcoming') ? Cache::get('movies-upcoming')->take($data[4]->pages) : [], 'movie');
        $movies['movie']['nowplayingmovies '] = $this->formatData(Cache::get('movies-nowplaying') ? Cache::get('movies-nowplaying')->take($data[5]->pages) : [], 'movie');
        $movies['tv']['airingtoday '] = $this->formatData(Cache::get('tv-airingtoday') ? Cache::get('tv-airingtoday')->take($data[3]->pages) : [], 'tv');
        $movies['tv']['onair '] = $this->formatData(Cache::get('tv-onair') ? Cache::get('tv-onair')->take($data[0]->pages) : [], 'tv');
        $movies['tv']['trending '] = $this->formatData(Cache::get('tv-trending') ?  collect(Cache::get('tv-trending'))->take($data[1]->pages) : [], 'tv');
        //    dd(Cache::get('movies-upcoming'));
        Cache::put('home-movies', $movies);

        return view('index', ['trending' => $trending, 'title'=>'Home']);
    }
}
