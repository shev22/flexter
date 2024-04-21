<?php

namespace App\Repositories;

use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;

class ChangesRepository
{

    public function changes($mediaType)
    {

        $media = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/' . $mediaType . '/changes')
            ->json()['results'];

        $changes = ($media);

        $url = 'https://api.themoviedb.org/3/' . $mediaType;

        $responses = Http::pool(function (Pool $pool) use ($url,  $changes) {
            return collect($changes)
                ->map(fn ($media) => $pool->withToken(config('services.tmdb.token'))->get($url . "/" . $media['id']));
        });


        return collect($responses)->map(function ($response) {
            if (array_key_exists("results", $response->json())) {
                return $response["results"];
            }
        })->collapse();
    }
}
