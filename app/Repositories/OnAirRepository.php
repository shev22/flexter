<?php


namespace App\Repositories;

use GuzzleHttp\Promise\Utils;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class OnAirRepository
{

    public function onAir($mediaType,  $pages)
    {
        //    $media = Http::withToken(config('services.tmdb.token'))
        //             ->get('https://api.themoviedb.org/3/'.$mediaType.'/now_playing')
        //             ->json()['results'];
        // return collect($media)->map(function ($media)use($mediaType) {
        //     return collect($media)->put('media_type', $mediaType);
        // });

        // $url = 'https://api.themoviedb.org/3/' . $mediaType . '/on_the_air';
        // $nbPages = $pages;
        // // $media = array();
        // $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
        //     return collect()
        //         ->range(1, $nbPages)
        //         ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "?page={$page}"));
        // });


        // return collect($responses)->map(function ($response) {
        //     if (array_key_exists("results", $response->json())) {
        //         return $response["results"];
        //     }
        // })->collapse();

        for ($i = 1; $i <= $pages; $i++) {
            $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/'.$mediaType.'/on_the_air?page=' . $i);
        }
        $responses = Utils::unwrap($promises);

        return collect($responses)->map(function ($response) {
            if (array_key_exists("results", $response->json())) {
                return $response["results"];
            }
        })->collapse();
    }
}