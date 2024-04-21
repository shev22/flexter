<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaBuffer5
{

    public function __construct(private MediaService $mediaService)
    {
    }

    public function buffer()
    {
        $this->mediaService->trendingAll();
    //     $this->mediaService->movie_genres();
    //     $this->mediaService->languages();
    //     $this->mediaService->tv_genres();
    //    $this->mediaService->topRatedTv();
    //     $this->mediaService->nowPlayingMovies();
     
    }


}
