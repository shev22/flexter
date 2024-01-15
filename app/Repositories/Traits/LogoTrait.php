<?php


namespace App\Repositories\Traits;
use Illuminate\Support\Facades\Http;

trait LogoTrait{

    public function logo($mediaType, $id)
    {
        $mediaLogo = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/' . $mediaType . '/' . $id . '?append_to_response=credits,videos,images')
            ->json()['images'];
        if ($mediaLogo !== []) {
            if ($mediaLogo['logos'] !== []) {
                return $mediaLogo['logos'][0]['file_path'];
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}