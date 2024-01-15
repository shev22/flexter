<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class GenreRepository{

    public function genre($mediaType)
    {
        return Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/genre/'.$mediaType.'/list')
        ->json()['genres'];
    }
}