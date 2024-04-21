<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class LanguageRepository{

    public function languages()
    {
        return Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/configuration/languages')
        ->json();
    }
}