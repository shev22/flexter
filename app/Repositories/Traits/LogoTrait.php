<?php
namespace App\Repositories\Traits;
use Illuminate\Support\Facades\Http;

trait LogoTrait
{
    public function logo($mediaType, $id)
    {
        $response = [];
        $media = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/' . $mediaType . '/' . $id . '?append_to_response=videos,images')
            ->json();
        if ($media['images'] !== []) {
            if ($media['images']['logos'] !== []) {
                foreach ($media['images']['logos'] as $item) {
                    if (isset($item['iso_639_1']) && $item['iso_639_1'] == 'en') {
                        $response['logo'] = $item['file_path'];
                        break;
                    } else {
                        $response['logo'] = [];
                    }
                }
            } else {
                $response['logo'] = [];
            }
        } else {
            $response['logo'] = [];
        }

        if ($media['videos'] !== []) {
            if ($media['videos']['results'] !== []) {
                foreach ($media['videos']['results'] as $item) {
                    if ($item['type'] == 'Trailer') {
                        $response['video'] = $item['key'];
                        break;
                    }
                }
            } else {
                $response['video'] = [];
            }
        } else {
            $response['video'] = [];
        }
        return $response;
    }
}
