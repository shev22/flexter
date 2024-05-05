<?php

namespace App\Http\Controllers\Services;

use Carbon\Carbon;
use App\Models\TvModel;
use App\Models\Settings;
use App\Models\TopRated;
use App\Models\ActorModel;
use App\Models\MovieModel;
use App\Models\Repository;
use Illuminate\Support\Str;
use App\Repositories\GenreRepository;
use App\Repositories\OnAirRepository;
use Illuminate\Support\Facades\Cache;
use App\Repositories\ActorsRepository;
use App\Repositories\ChangesRepository;
use App\Livewire\Traits\FormatDataTrait;
use App\Repositories\LanguageRepository;
use App\Repositories\PorpularRepository;
use App\Repositories\TopRatedRepository;
use App\Repositories\TrendingRepository;
use App\Repositories\UpComingRepository;
use App\Repositories\NowPlayingRepository;
use App\Repositories\AiringTodayRepository;

class MediaService
{
    use FormatDataTrait;
    private $count = [];


    public function __construct(

        private OnAirRepository $onAir,
        private GenreRepository $genre,
        private ActorsRepository $actors,
        private ChangesRepository $changes,
        private PorpularRepository $porpular,
        private UpComingRepository $upComing,
        private TopRatedRepository $topRated,
        private TrendingRepository $trending,
        private LanguageRepository $languages,
        private NowPlayingRepository $nowPlaying,
        private AiringTodayRepository $airingToday,


    ) {
    }



    /**
     * MOVIES SECTION
     *
     * @return void
     */

    public function trending_movies()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->movies_trending;
        Cache::put('movies-trending',  $this->trending->trending('movie', $data));
    }

    public function popularMovies()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->movies_popular;
         Cache::put('movies-popular',  $this->porpular->porpular('movie',   $data));
    }

    public function top_ratedMovies()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->movies_toprated;
        Cache::put('movies-toprated', $this->topRated->topRated('movie',  $data));
    }

    public function up_comingMovies()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->movies_upcoming;
        Cache::put('movies-upcoming',  $this->upComing->upComing('movie',  $data));
    }

    public function movie_genres()
    {
        Cache::put('movies-genre', $this->genre->genre('movie'));
    }


    public function nowPlayingMovies()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->movies_nowplaying;
        Cache::put('movies-nowplaying', $this->nowPlaying->nowPlaying('movie',  $data));
    }



    /**
     * TV SECTION
     *
     * @return void
     */
    public function trending_tv()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->tv_trending;
        Cache::put('tv-trending', $this->trending->trending('tv',  $data));;
    }

    public function popularTv()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->tv_popular;
        Cache::put('tv-popular', $this->porpular->porpular('tv',  $data));
    }

    public function topRatedTv()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->tv_toprated;
        Cache::put('tv-toprated', $this->topRated->topRated('tv',  $data));
    }

    public function airingToday()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->tv_airingtoday;
        Cache::put('tv-airingtoday', $this->airingToday->airingToday('tv',  $data));
    }

    public function onAir()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->tv_onair;
        Cache::put('tv-onair', $this->onAir->onAir('tv',  $data));
    }

    public function tv_genres()
    {

        Cache::put('tv-genre', $this->genre->genre('tv'));
    }


    public function trendingAll()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->all_trending;
        Cache::put('all-trending', $this->trending->trending('all', $data));
    }

    public function languages()
    {

        Cache::put('languages', $this->languages->languages());
    }


    public function getActors()
    {
        $data = Settings::where('config_block_id', 1)->first();
        $data = json_decode($data->config_data);
        $data =  $data->repository->actors;
        Cache::put('actors', $this->actors->actors($data));
    }


    public function movies()
    {
        $time = time();

        $statistics = [
            'repository' => 'movie-db',
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];
        try {
            $merged = collect(Cache::get('movies-trending'))->merge(Cache::get('movies-nowplaying'));
            $merged = $merged->merge(Cache::get('movies-upcoming'));
            $merged = $merged->merge(Cache::get('movies-popular'));
            $merged = $merged->merge(Cache::get('movies-toprated'));
            $movies =  MovieModel::all()->pluck('id')->toArray();


            foreach (array_chunk($this->formatData($merged, 'movie')->unique('id')->toArray(), 1000) as $t) {
                collect($t)->map(function ($movie) use ($movies) {
                    if (!in_array($movie['id'], $movies)) {
                        $this->count[] = $movie;
                        MovieModel::create($movie);
                    }
                });
            }

            $statistics['quantity'] = count($this->count);
            $statistics['status'] = 'success';
            $statistics['duration'] =  (time() - $time);
        } catch (\Throwable $th) {

            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
        }
        Repository::create($statistics);
    }


    public function topRated()
    {

        $time = time();
        $statistics = [
            'repository' => 'toprated-db',
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];
        try {
            $movies =  $this->formatData(Cache::get('movies-toprated'), 'movie');
            $tv =  $this->formatData(Cache::get('tv-toprated'), 'tv');
            $merged =  $movies->merge($tv);

            $movies =  TopRated::all()->pluck('id')->toArray();
            foreach (array_chunk($merged->unique('id')->toArray(), 1000) as $t) {
                collect($t)->map(function ($movie) use ($movies) {
                    if (!in_array($movie['id'], $movies)) {
                        $this->count[] = $movie;
                        TopRated::create($movie);
                    }
                });
            }
            $statistics['quantity'] = count($this->count);
            $statistics['status'] = 'success';
            $statistics['duration'] =  (time() - $time);
        } catch (\Throwable $th) {

            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
        }
        Repository::create($statistics);
    }



    public function tv()
    {
        $time = time();
        $statistics = [
            'repository' => 'movie-db',
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];
        try {


            $merged = collect(Cache::get('tv-trending'))->merge(Cache::get('tv-airingtoday'));
            $merged = $merged->merge(Cache::get('tv-onair'));
            $merged = $merged->merge(Cache::get('tv-popular'));
            $merged = $merged->merge(Cache::get('tv-toprated'));
            $tvs =  TvModel::all()->pluck('id')->toArray();

            foreach (array_chunk($this->formatData($merged, 'tv')->unique('id')->toArray(), 1000) as $t) {
                collect($t)->map(function ($tv) use ($tvs) {
                    if (!in_array($tv['id'], $tvs)) {
                        $this->count[] = $tv;
                        TvModel::create($tv);
                    }
                });
            }
            $statistics['quantity'] = count($this->count);
            $statistics['status'] = 'success';
            $statistics['duration'] =  (time() - $time);
        } catch (\Throwable $th) {

            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
        }
        Repository::create($statistics);
    }



    public function actors()
    {

        $time = time();
        $statistics = [
            'repository' => 'movie-db',
            'quantity' => null,
            'duration' => null,
            'status' => null,
            'error_message' => null,
            'date' => Carbon::now()->format('d-m-y'),
        ];
        try {
            $actors =   Cache::get('actors');
            $actormodel = ActorModel::all()->pluck('id')->toArray();

            $data = $actors->map(function ($actor) {
                return collect($actor)->merge([
                    'profile_path' => $actor['profile_path']
                        ? 'https://image.tmdb.org/t/p/w235_and_h235_face' . $actor['profile_path']
                        : 'https://ui-avatars.com/api/?size=235&name=' . $actor['name'],
                    'known_for' => collect($actor['known_for'])->where('media_type', 'movie')->pluck('title')->union(
                        collect($actor['known_for'])->where('media_type', 'tv')->pluck('name')
                    )->implode(', '),
                ])->only([
                    'name', 'id', 'profile_path', 'known_for',
                ])->put('slug',  Str::of($actor['name'])->slug('-'));
            });

            foreach (array_chunk($data->unique('id')->toArray(), 1000) as $t) {
                collect($t)->map(function ($actor) use ($actormodel) {
                    if (!in_array($actor['id'], $actormodel)) {
                        ActorModel::create($actor);
                    }
                });
            }
            $statistics['quantity'] = count($this->count);
            $statistics['status'] = 'success';
            $statistics['duration'] =  (time() - $time);
        } catch (\Throwable $th) {

            $statistics['status'] = 'failed';
            $statistics['error_message'] = $th->getMessage();
            $statistics['duration'] =  (time() - $time);
        }
        Repository::create($statistics);
        //ActorModel::insert($data->toArray());

    }
}
