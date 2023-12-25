<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Livewire\SearchTrait;
use App\ViewModels\TvViewModel;
use App\ViewModels\HomeViewModel;
use App\ViewModels\MoviesViewModel;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Services\MediaService;

class PagesController extends Controller
{
    use SearchTrait;
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private MediaService $mediaService
    ) {
    }

    public function index()
    {

        $movie_genres = $this->mediaService->movie_genres();
        $tv_genres = $this->mediaService->tv_genres();
        $up_coming = $this->mediaService->up_comingMovies();
        $trending_movies = $this->mediaService->trending_movies();
        $trending_tv = $this->mediaService->trending_tv();

        $moviesViewModel = new MoviesViewModel(
            null,
            $movie_genres,
            null,
            $up_coming,
            $trending_movies,

        );


        $tvViewModel = new TvViewModel(
            null,
            null,
            $tv_genres,
            $trending_tv,
        );

        $viewModel = new HomeViewModel($moviesViewModel,  $tvViewModel,);

        //    dd( $viewModel );

        return view('index', $viewModel);
    }

    public function search($query = null)
    {
        return view('search', ['query' => $query ]);
    }

    public function play( $slug, $id)
    {
       
        $result = Http::get("https://yts.mx/api/v2/movie_details.json?imdb_id=".$id)->json();

        $movie['740']['hash'] =  $result['data']['movie']['torrents'][0]['hash'];
        $movie['1080']['hash'] =  $result['data']['movie']['torrents'][1]['hash'];
        $movie['title'] = str_replace( ' ', '+', $result['data']['movie']['title_long']);

        return view('play',['movie'=> $movie]);
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
