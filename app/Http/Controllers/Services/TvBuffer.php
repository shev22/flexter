<?php

namespace App\Http\Controllers\Services;


class TvBuffer
{

    public function __construct(private MediaService $mediaService)
    { }
    public function bufferTv()
    {
        $this->mediaService->popularTv(1);
        $this->mediaService->tv_genres();
        $this->mediaService->trending_tv();
        $this->mediaService->topRatedTv();
    }
}