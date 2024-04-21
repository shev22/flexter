<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;
use App\ViewModels\TvShowViewModel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;


class TvController extends Controller
{



    public function tv()
    {
      
        //  $this->mediaService->popularTv($page);

        // $topRatedTv =$this->mediaService->tv_genres();

        //  $genres = $this->mediaService->trending_tv();

        // $viewModel = new TvViewModel(
        //     // $popularTv,
        //     // $topRatedTv,
        //     // $genres,
        // );

        return view('tv.tv');
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
    public function show($slug, $id)
    {
      
        $tvshow = Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/'.$id.'?append_to_response=credits,videos,images')
        ->json();

        $related =  Http::withToken(config('services.tmdb.token'))
        ->get('https://api.themoviedb.org/3/tv/' . $id . '/similar?language=en-US&page=1')
        ->json();

    $viewModel = new TvShowViewModel($tvshow, $related['results']);

    return view('tv.show', $viewModel);
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
