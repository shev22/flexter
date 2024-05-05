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
        // dump($media);
        if ($media['images'] !== []) {
            if ($media['images']['logos'] !== []) {
                $response['logo'] = $media['images']['logos'][0]['file_path'];
            } else {
                $response['logo'] = [];
            }
        }

        if ($media['videos'] !== []) {
            if ($media['videos']['results'] !== []) {
                foreach ($media['videos']['results'] as $item) {
                    if ($item['type'] == 'Trailer') {

                        $response['video'] = $item['key'];
                    }
                }
            } else {
                $response['video'] = [];
            }
        }
        return $response;
    }
}
