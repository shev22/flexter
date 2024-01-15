<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Http;

class NowPlayingRepository{

    public function nowPlaying($mediaType)
    {
       $media = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/'.$mediaType.'/now_playing')
                ->json()['results'];
                return collect($media)->map(function ($media)use($mediaType) {
                    return collect($media)->put('media_type', $mediaType);
                });
    }
}