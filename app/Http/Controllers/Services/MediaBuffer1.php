<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaBuffer1
{

    public function __construct(private MediaService $mediaService)
    {
    }

    public function buffer()
    {

       $this->mediaService->trending_movies();
        $this->mediaService->up_comingMovies();
        $this->mediaService->top_ratedMovies();
      
    }

    // public function bufferTv()
    // {
    //     $this->mediaService->popularTv(1);
    //     $this->mediaService->tv_genres();
    //     $this->mediaService->trending_tv();
    //     $this->mediaService->topRatedTv();
    // }



}
