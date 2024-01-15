<?php

namespace App\ViewModels;

use Spatie\ViewModels\ViewModel;

class HomeViewModel extends ViewModel
{
    public function __construct(public MoviesViewModel $movies, public TvViewModel $tv,)
    {
    }

    public function nowPlayingMovies()
    {
      return $this->movies->nowPlayingMovies() ;
    }

    public function trending_movies()
    {
        return $this->movies->trending();
    }

    public function trending_tv()
    {
        return $this->tv->trending();
    }
    
    public function topRatedTv()
    {
        return  $this->tv->topRatedTv();
    }

}
