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




}
