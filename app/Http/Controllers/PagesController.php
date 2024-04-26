<?php

namespace App\Http\Controllers;

use App\Models\TvModel;
use App\Models\Settings;
use App\Models\MovieModel;
use Illuminate\Http\Request;
use App\ViewModels\TvViewModel;

use App\ViewModels\HomeViewModel;
use App\ViewModels\MoviesViewModel;
use App\Livewire\Traits\SearchTrait;
use Illuminate\Support\Facades\Auth;
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

        // $movies =  TvModel::all()->pluck('id')->toArray();
        // dump(count($movies));
       // Cache::flush();
        // // dd($this->nightMode->checkActiveBackground());
       // // $time  = time ();
      // ( $this->buffer->trendingAll());
        //     ( $this->buffer->airingToday());
        //   ($this->buffer->onAir()); ;
        // $this->buffer->trending_tv();
        //     $this->buffer->topRatedTv();
        //      $this->buffer->tv_genres();
        //   $this->buffer->popularTv();
        // $this->buffer->trending_movies();
        //  ($this->buffer->popularMovies()) ;
        //   $this->buffer->up_comingMovies();
         //   $this->buffer->movie_genres();
        //  $this->buffer->nowPlayingMovies();
        // $this->buffer->top_ratedMovies();
    // //  ($this->buffer->changes_movies()) ;
        // ($this->buffer->getActors()) ;
        //($this->buffer->movies()) ;
      //  ($this->buffer->topRated()) ;
        //    ($this->buffer->tv()) ;

 //dd( Cache::get('all-trending' ) );
            // dump(time() - $time);
        //    dd($this->buffer->discover());
       // $data = [2];
//         Cache::put('data',  $data );

//             $test = [2,253];
//         Cache::put('test', $test);
 //dd(Cache::get('all-trending'));
        // (Cache::forget('movies-changes'));

        
        // $moviesViewModel = new MoviesViewModel;
        // $tvViewModel = new TvViewModel;
        // $viewModel = new HomeViewModel($moviesViewModel,  $tvViewModel,);

        return view('index');
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
        //  $nightmode = ['nightmode'=> true];
        //     session()->put('nightmode', $nightmode);

        // if (Auth::check()) {
        //     $settings = Settings::where('user_id', Auth::id())->where('config_block_id', 1)->first();

        //     $data = json_decode($settings->config_data);

        //     if ($data->nightmode == true) {
        //         $data->nightmode = false;
        //         $settings->config_data = json_encode($data);
        //         $settings->save();
        //     } else {
        //         $data->nightmode = true;
        //         $settings->config_data = json_encode($data);
        //         $settings->save();
        //     }

        //     $result = [
        //         "nightmode" =>   $data->nightmode,
        //         "status" => "success",
        //     ];
        // } else {
        //     $result = [
        //         "status" => "fail",
        //     ];
        // }

        // return response()->json($result);
        //  dd(session('nightmode'));


        if (session('nightmode') == false || session('nightmode') == null) {
            session()->put('nightmode', true);
        } else {
            session()->put('nightmode', false);
        }
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
