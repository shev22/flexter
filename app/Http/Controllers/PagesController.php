<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livewire\SearchTrait;
use App\ViewModels\TvViewModel;
use App\ViewModels\HomeViewModel;
use App\ViewModels\MoviesViewModel;

use App\Http\Controllers\Services\MediaService;


class PagesController extends Controller
{
    use SearchTrait;
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private MediaService $buffer
    ) {
    }

    public function index()
    {

            // $time  = time ();
        // $this->buffer->trending_tv();
        // $this->buffer->topRatedTv();
        // $this->buffer->tv_genres();
        // $this->buffer->trending_movies();
        // $this->buffer->popularMovies();
        // $this->buffer->up_comingMovies();
        // $this->buffer->movie_genres();
        // $this->buffer->nowPlayingMovies();
        // $this->buffer->years();
 
        // dump(time() - $time);
        // Cache::put('test', 57);

        // (Cache::forget('years'));

   //  Cache::flush();
        $moviesViewModel = new MoviesViewModel;
        $tvViewModel = new TvViewModel;
        $viewModel = new HomeViewModel($moviesViewModel,  $tvViewModel,);

        return view('index', $viewModel);
    }

    public function search($query = null)
    {
        return view('search', ['query' => $query ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
