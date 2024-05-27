<?php

namespace App\Http\Controllers\Services;

use GuzzleHttp\Promise\Utils;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaBuffer3
{

    public function __construct(private MediaService $mediaService)
    {
    }

    public function buffer()
    {
        $this->mediaService->popularMovies();

        $this->mediaService->movie_genres();
        $this->mediaService->languages();
        $this->mediaService->tv_genres();
       $this->mediaService->topRatedTv();
       
    }

}
