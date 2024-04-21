<?php
/**
 * 24.02.2024 2:20pm
 * Francis Okoroafor
 */

namespace App\Repositories;
use GuzzleHttp\Promise\Utils;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class ActorsRepository{

 
    public function actors( $pages)
    { 
     
        // $url = 'https://api.themoviedb.org/3/person/popular';
       
        // $nbPages = $pages;
        // // $media = array();
        // $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
        //     return collect()
        //         ->range(1, $nbPages)
        //         ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "?page={$page}"));
        // });


        // //  dd(  $responses);
        // return collect($responses)->map(function($response){ 
        //     if(array_key_exists("results",$response->json()))
        //     {
        //             return $response["results"];
        //     }
        //     return $response;
        //   })->collapse();

          for ($i = 1; $i <= $pages; $i++) {
            $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/person/popular?page=' . $i);
        }
        $responses = Utils::unwrap($promises);

        return collect($responses)->map(function ($response) {
            if (array_key_exists("results", $response->json())) {
                return $response["results"];
            }
        })->collapse();
     

    }
}