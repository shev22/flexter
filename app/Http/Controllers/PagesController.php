<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Livewire\SearchTrait;
use App\ViewModels\TvViewModel;
use App\ViewModels\HomeViewModel;

use App\ViewModels\MoviesViewModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use App\Http\Controllers\Services\MediaService;
use App\Http\Controllers\Services\PagesService;


class PagesController extends Controller
{
    use SearchTrait;
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        private MediaService $buffer,
        private PagesService $nightMode
    ) {
    }
    public function index()
    {
        // dd($this->nightMode->checkActiveBackground());
        // $time  = time ();
        //   dd( $this->buffer->trendingAll());
        //     ( $this->buffer->airingToday());
        //   ($this->buffer->onAir()); ;
        // $this->buffer->trending_tv();
        //     $this->buffer->topRatedTv();
        //     $this->buffer->tv_genres();
        //    $this->buffer->popularTv();
        // $this->buffer->trending_movies();
        //    ($this->buffer->popularMovies()) ;
        //     $this->buffer->up_comingMovies();
        //     $this->buffer->movie_genres();
        // $this->buffer->nowPlayingMovies();
        // $this->buffer->top_ratedMovies();
        // dump(time() - $time);
        //   dd(7867);

        // Cache::put('test', 57);

        // (Cache::forget('tv-popular'));

        //  Cache::flush();
        // $moviesViewModel = new MoviesViewModel;
        // $tvViewModel = new TvViewModel;
        // $viewModel = new HomeViewModel($moviesViewModel,  $tvViewModel,);

        return view('index',['nightMode'=>$this->nightMode->checkActiveBackground()]);
    }

    public function search($query = null)
    {
        return view('search', ['query' => $query]);
    }

    public function wishlist()
    {
        return view('wishlist');
    }


    public function settings()
    {
        $settings = Settings::where('user_id', Auth::id())->where('config_block_id', 1)->first();
        $data = json_decode($settings->config_data);

        if ($data->nightmode == true) {
            $data->nightmode = false;
            $settings->config_data = json_encode($data);
            $settings->save();
        } else {
            $data->nightmode = true;
            $settings->config_data = json_encode($data);
            $settings->save();
        }

        $result = [
            "nightmode" =>   $data->nightmode ,
            "status" => "success",
        ];
       return response()->json($result);

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
