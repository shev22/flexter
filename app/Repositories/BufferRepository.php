<?php


namespace App\Repositories;

use GuzzleHttp\Promise\Utils;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BufferRepository
{

    public function buffer($start, $end)
    {
        $time = time();
        for ($i = $start; $i <  $end; $i++) {
            $promises[] = Http::async()->get("https://vidsrc.xyz/movies/latest/page-$i.json");
        }

        $responses = Utils::unwrap($promises);

        foreach ($responses as $response) {
            $data[] = $response->json();
        }
        dump(time() - $time);

        return collect($data)->map(function ($t) {
            return $t['result'];
        })->collapse();
    }

    public function bufferContent()
    {
        // $data = [];
        $merged = Cache::get('data1')->merge(Cache::get('data3'));
        $merged = $merged->merge(Cache::get('data2'));
        // $merged = $merged->merge(Cache::get('data1'));

        // foreach( $merged as $item)
        // {
        //     //      $data[] = Http::withToken(config('services.tmdb.token'))
        //     // ->get('https://api.themoviedb.org/3/movie/' . $item['tmdb_id'])
        //     // ->json();
        //      $data[] = $item['tmdb_id'];
        // }
    //   dd( $data);

    //         $data = $merged->take(10);
    //   $url = 'https://api.themoviedb.org/3/movie/';
  
    //   // $media = array();
    //   $responses = Http::pool(function (Pool $pool) use ($url, $data) {
    //       return collect()
          
    //           ->map(fn ($data) => $pool->withToken(config('services.tmdb.token'))->get($url . "{$data}"));
    //   });


    //   dd(  $responses);
    //   return collect($responses)->map(function ($response) {
    //       if (array_key_exists("results", $response->json())) {
    //           return $response["results"];
    //       }
    //   })->collapse();



//     dd(  $data);


//     $responses = Http::pool(fn (Pool $pool) => [

       
        
//         $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[0]),
     
 
//     ]);

//    dd(  $responses);
    //   return collect($responses)->map(function ($response) {
    //       if (array_key_exists("results", $response->json())) {
    //           return $response["results"];
    //       }
    //   })->collapse();


//     $merged = Cache::get('data1')->merge(Cache::get('data3'));
// $merged = $merged->merge(Cache::get('data2'));
// $merged = $merged->merge(Cache::get('data1'));

foreach( $merged->take(2000) as $item)
{
    //      $data[] = Http::withToken(config('services.tmdb.token'))
    // ->get('https://api.themoviedb.org/3/movie/' . $item['tmdb_id'])
    // ->json();

    $promises[] = Http::withToken(config('services.tmdb.token'))->async()->get('https://api.themoviedb.org/3/movie/' . $item['tmdb_id']);
   // $data[] = $item['tmdb_id'];
}



$responses = Utils::unwrap($promises);

foreach ($responses as $response) {
    $data[] = $response->json();
}


return( $data);


// $responses = Http::pool(fn (Pool $pool) => [
//     $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[0]  ),
//     $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[1]  ),
//     $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[2]  ),
//     $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[3]  ),
 
//       $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[4]  ),
//      $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[5]  ),
//      $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[6]  ),
//      $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[7]  ),
//     // $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[8]  ),
//     // $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[9]  ),
//     // $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[10]  ),
//      $pool->withToken(config('services.tmdb.token'))->get('https://api.themoviedb.org/3/movie/' . $data[11]  ),


// ]);   


//      return collect($responses)->map(function ($response) {
//         //  if (array_key_exists("results", $response->json())) {
//               return $response;
// //}
//       });
    }
}
