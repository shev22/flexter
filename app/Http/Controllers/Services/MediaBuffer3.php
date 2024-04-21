<?php

namespace App\Http\Controllers\Services;

use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaBuffer3
{

    public function __construct(private MediaService $mediaService)
    {
    }

    public function buffer()
    {
        $this->mediaService->popularMovies();
        $this->mediaService->getActors();
        $this->mediaService->topRated();

        // for ($i = 0; $i < 1000; $i++) {
        //     $promises[] = Http::async()->get("https://vidsrc.xyz/movies/latest/page-$i.json");
        // }
        
        // $responses = Utils::unwrap($promises);
        
        // foreach ($responses as $response) {
        //     $data[] = $response->json();
        //  }
        
        //  return collect($data)->map(function($t){return $t['result'];})->collapse()->toArray();

//         foreach(collect( Cache::get('data')) as $item)
//         {
//             $promises[]= Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/movie/' . $item['tmdb_id'] . '?append_to_response=videos');
//         }

      

//         $responses = Utils::unwrap($promises);
        
//         foreach ($responses as $response) {
//             $data[] = $response->json();
//          }

//  return $data;
     
    }

    // public function bufferTv()
    // {
    //     $this->mediaService->popularTv(1);
    //     $this->mediaService->tv_genres();
    //     $this->mediaService->trending_tv();
    //     $this->mediaService->topRatedTv();
    // }

    // public function flashBuffer()
    // {
    //     Cache::flush();
    // }

}
