<?php

namespace App\Http\Controllers\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class MediaBuffer4
{

    public function __construct(private MediaService $mediaService)
    {
    }

    public function buffer()
    {
        $this->mediaService->movies();
        $this->mediaService->tv();
        $this->mediaService->actors();
     
    }


}
