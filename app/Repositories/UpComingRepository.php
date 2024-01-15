<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class UpComingRepository{

    public function upComing($mediaType)
    {
        return Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/'.$mediaType.'/upcoming')
            ->json()['results'];
       
    }
}