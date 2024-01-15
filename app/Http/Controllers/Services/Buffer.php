<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class Buffer
{

    public function __construct(private MediaService $mediaService)
    {
    }

    public function bufferMovies()
    {
        $this->mediaService->movie_genres();
        $this->mediaService->trending_movies();
        $this->mediaService->popularMovies(1);
        $this->mediaService->nowPlayingMovies();
    }

    public function bufferTv()
    {
        $this->mediaService->popularTv(1);
        $this->mediaService->tv_genres();
        $this->mediaService->trending_tv();
        $this->mediaService->topRatedTv();
    }

    public function flashBuffer()
    {
        Cache::flush();
    }

}
