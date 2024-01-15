<?php

namespace App\Http\Controllers\Services;


class MovieBuffer
{

    public function __construct(private MediaService $mediaService)
    { }
    public function bufferMovies()
    {
        $this->mediaService->movie_genres();
        $this->mediaService->trending_movies();
        $this->mediaService->popularMovies();
        $this->mediaService->nowPlayingMovies();
    }
}