<?php


namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Repository;
use GuzzleHttp\Promise\Utils;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class PorpularRepository
{

    // public function porpular($mediaType, $pages)
    // {

    //     $url = 'https://api.themoviedb.org/3/'.$mediaType.'/popular';
    //     $nbPages = $pages;
    //     $media = array();
    //     $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
    //         return collect()
    //             ->range(1, $nbPages)
    //             ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "?page={$page}"));
    //     });


    //     $data = [];
    //     foreach ($responses as $response) {
    //         array_push($media,  $response->json());
    //         foreach ($media as $item) {

    //             foreach ($item['results'] as $value) {
    //                 array_push($data,  $value);
    //             }
    //         }
    //     }

    //     dd( $data);
    // }

    public function porpular($mediaType, $pages)
    {

        // $url = 'https://api.themoviedb.org/3/'.$mediaType.'/popular';
        // $nbPages = $pages;
        // // $media = array();
        // $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
        //     return collect()
        //         ->range(1, $nbPages)
        //         ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "?page={$page}"));
        // });


        // // dd(  $responses);
        // return collect($responses)->map(function ($response) {
        //     if (array_key_exists("results", $response->json())) {
        //         return $response["results"];
        //     }
        // })->collapse();

        //         return collect($responses)->map(function($response){ 


        //             dump($response ->json());
        // });


        // for ($i = 1; $i <= $pages; $i++) {
        //     $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/'.$mediaType.'/popular?page=' . $i);
        // }
        // $responses = Utils::unwrap($promises);

        // return collect($responses)->map(function ($response) {
        //     if (array_key_exists("results", $response->json())) {
        //         return $response["results"];
        //     }
        // })->collapse();



        $time = time();
        $statistics = [
            'repository' => 'popular-' . $mediaType,
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];



        try {

            for ($i = 1; $i <= $pages; $i++) {
                $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/' . $mediaType . '/popular?page=' . $i);
            }
            $responses = Utils::unwrap($promises);

            $media = collect($responses)->map(function ($response) {
                if (array_key_exists("results", $response->json())) {
                    return $response["results"];
                }
            })->collapse();

            $statistics['status'] = 'success';
            $statistics['quantity'] = count($media).' / '.$pages;
            $statistics['duration'] =  (time() - $time);

            Repository::create($statistics);
            return $media;
        } catch (\Throwable $th) {
            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
            Repository::create($statistics);
        }
    }
}
