<?php

namespace App\Livewire\Movies;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Models\WishListModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class NowPlayingMovies extends Component
{
    use WithPagination;

    public $twothousands = [];
    public $sortByGenre = [];
    public $setWeekendDays;
    public $itemsPerPage = 50;
    public $filterdInYears = [];
    public $filterdInGenres = [];
    public $nineties, $eighties, $seventies, $sixties, $ealier;

    public function genres()
    {
        return collect(Cache::get('movies-genre'))->mapWithKeys(function ($genre) {
            return [$genre['id'] => $genre['name']];
        });
    }

    public function wishlist($movie)
    {

        if (Auth::check()) {
            $movie['user_id'] = Auth::id();
            $result = WishListModel::where('id', $movie['id'])->where('user_id', Auth::id())->first();

            if (!$result) {
                WishListModel::create($movie);
            } else {
                $result->delete();
            }
        }
    }

    public function isWishListed($id)
    {
        if (Auth::check()) {
            if (WishListModel::where('id', $id)->where('user_id', Auth::id())->first()) {
                return true;
            } else {
                return false;
            }
        }
    }


    public function loadMore()
    {
        $this->itemsPerPage += 10;
    }
    

    public function render()
    {
        
        $cachedData= (collect(Cache::get('movies-nowplaying')))
       ->when($this->sortByGenre !== [], function ($e) {
            $data = [];
            foreach ($e as $value) {
                if (count(array_intersect($this->sortByGenre, $value['genre_ids'])) > 0) {
                    // array_push($this->filterdInGenres, collect($value));
                    $data[] = $value;
                }
            }

            return collect($data) ; 
        });

//    dd( $cachedData);
// 

    $nowPlaying = (collect($cachedData)->take($this->itemsPerPage))  
        ->map(function ($cachedData) {
        return collect($cachedData)->merge([
            'poster_path' => 'https://image.tmdb.org/t/p/w500/' . $cachedData['poster_path'],
            'backdrop_path' => $cachedData['backdrop_path'],
            'vote_average' => round($cachedData['vote_average'], 1),
            'release_date' => Carbon::parse($cachedData['release_date'])->format('M d, Y'),
        ])->only([
            'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'logo', 'overview', 'release_date', 'genres', 'media_type', 'backdrop_path'
        ])->put('slug',  Str::of($cachedData['title'])->slug('-'))->put('year', Carbon::parse($cachedData['release_date'])->format('Y'));
    })     ->when($this->twothousands !== [], function ($e) {

     return   $e->whereIn('year', $this->twothousands);

});


// dd($popularMovies);

    // ->take($this->itemsPerPage);
        return view('livewire.movies.now-playing-movies', ['nowPlaying' => $nowPlaying]);
    }
}
