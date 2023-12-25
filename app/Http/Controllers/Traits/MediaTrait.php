<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Http;


trait MediaTrait
{

    // public function logo($id)
    // {

    //     return collect(Http::withToken(config('services.tmdb.token'))
    //         ->get('https://api.themoviedb.org/3/movie/' . $id . '?append_to_response=credits,videos,images')
    //         ->json())
    //         ->merge([
    //             'images' => 234
    //         ])
    //         ->only(['images']);
    // }
}
