<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaBuffer2
{

    public function __construct(private MediaService $mediaService)
    {
    }

    // public function bufferMovies()
    // {
    //     $this->mediaService->movie_genres();
    //     $this->mediaService->trending_movies();
    //     $this->mediaService->popularMovies(1);
    //     $this->mediaService->nowPlayingMovies();
    // }

    public function buffer()
    {
        $this->mediaService->airingToday();
        $this->mediaService->onAir();
        $this->mediaService->trending_tv();

        $this->mediaService->popularTv();
    }



}
