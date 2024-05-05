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
        $this->mediaService->getActors();
        $this->mediaService->nowPlayingMovies();
     
    }


}
