<?php


namespace App\Repositories;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class UpComingRepository{

    public function upComing($mediaType, $pages)
    {
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/'.$mediaType.'/upcoming')
        //     ->json()['results'];
       


        $url = 'https://api.themoviedb.org/3/'.$mediaType.'/upcoming';
        $nbPages = $pages;
        // $media = array();
        $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
            return collect()
                ->range(1, $nbPages)
                ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "?page={$page}"));
        });

        return collect($responses)->map(function($response){ return $response
            ->json()['results'];})->collapse();
    }
}