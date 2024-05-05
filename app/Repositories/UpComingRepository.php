<?php


namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Repository;
use GuzzleHttp\Promise\Utils;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class UpComingRepository
{

    public function upComing($mediaType, $pages)
    {
        // return Http::withToken(config('services.tmdb.token'))
        //     ->get('https://api.themoviedb.org/3/'.$mediaType.'/upcoming')
        //     ->json()['results'];



        //     $url = 'https://api.themoviedb.org/3/'.$mediaType.'/upcoming';
        //     $nbPages = $pages;
        //     // $media = array();
        //     $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
        //         return collect()
        //             ->range(1, $nbPages)
        //             ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "?page={$page}"));
        //     });

        //    // dd(  $responses);
        //     return collect($responses)->map(function ($response) {
        //         if (array_key_exists("results", $response->json())) {
        //             return $response["results"];
        //         }
        //     })->collapse();



        // $url = 'https://vidsrc.xyz/movies/latest/';
        // $nbPages = $pages;
        // // $media = array();
        // $responses = Http::pool(function (Pool $pool) use ($url, $nbPages) {
        //     return collect()
        //         ->range(11, 20)
        //         ->map(fn ($page) => $pool->get($url . "page-{$page}".'.json'));
        // });

        // //dd(  $responses);
        // return collect($responses)->map(function ($response) {
        //     // if (array_key_exists("results", $response->json())) {
        //         return $response->json();
        //     // }
        // })->collect()->map(function($t){return $t['result'];})->collapse()->dd();








        $time = time();
        $statistics = [
            'repository' => 'upcoming-' . $mediaType,
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];



        try {

            for ($i = 1; $i <= $pages; $i++) {
                $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/' . $mediaType . '/upcoming?page=' . $i);
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
