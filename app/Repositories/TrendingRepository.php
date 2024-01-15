<?php


namespace App\Repositories;

use Illuminate\Support\Facades\Http;
use App\Repositories\traits\LogoTrait;

class TrendingRepository{
    use LogoTrait;

    public function trending($mediaType, $period)
    {
       $media = Http::withToken(config('services.tmdb.token'))
                ->get('https://api.themoviedb.org/3/trending/'.$mediaType.'/'.$period)
                ->json()['results'];
            return collect($media)->map(function ($movie)use($mediaType) {
                return collect($movie)->put('logo', $this->logo($mediaType, $movie['id']));
            });
    }
}