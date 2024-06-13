<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livewire\Traits\SearchTrait;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Services\MediaService;



class PagesController extends Controller
{
    use SearchTrait;

    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private MediaService $buffer,
    ) {
    }
    public function index()
    {


        // $movies =  MovieModel::all()->pluck('id')->toArray();
        // dump(count($movies));
        //Cache::flush();
        // // dd($this->nightMode->checkActiveBackground());
        // // $time  = time ();
    //    ( $this->buffer->trendingAll());
        // ( $this->buffer->airingToday());
        // ($this->buffer->onAir()); ;
        // $this->buffer->trending_tv();
        //    $this->buffer->topRatedTv();
        //      $this->buffer->tv_genres();
        //  $this->buffer->popularTv();
        //  $this->buffer->trending_movies();
        //  ($this->buffer->popularMovies()) ;
   //
        //    $this->buffer->movie_genres();
        //  $this->buffer->nowPlayingMovies();
        //  $this->buffer->top_ratedMovies();
        // ($this->buffer->getActors()) ;
        //  ($this->buffer->movies()) ;
        //  ($this->buffer->topRated()) ;
        // ($this->buffer->languages()) ;
        //    ($this->buffer->tv()) ;

        // dd(Cache::get('tv-onair'));


     
    }



    public function search($query = null)
    {
        return view('search', ['query' => $query]);
    }

    public function wishlist()
    {
        return view('wishlist');
    }

    public function toprated()
    {
        return view('toprated');
    }


    public function nightMode()
    {

        if (session('nightmode') == false || session('nightmode') == null) {
            session()->put('nightmode', true);
        } else {
            session()->put('nightmode', false);
        }
    }


}
