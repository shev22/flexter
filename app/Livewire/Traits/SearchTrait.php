<?php

namespace App\Livewire\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Client\Pool;
use Illuminate\Support\Facades\Http;


trait SearchTrait
{
    public function search($query)
    {

        if (strlen($query) >= 2) {
            // $searchResults = Http::withToken(config('services.tmdb.token'))
            //     ->get('https://api.themoviedb.org/3/search/multi?query=' . $query)
            //     ->json()['results'];
            //  return( $this->transformSearchResult($searchResults)) ;

            $url = 'https://api.themoviedb.org/3/search/multi?query=' . $query;
            $nbPages = 10;
            // $media = array();
            $searchResults = Http::pool(function (Pool $pool) use ($url, $nbPages) {
                return collect()
                    ->range(1, $nbPages)
                    ->map(fn ($page) => $pool->withToken(config('services.tmdb.token'))->get($url . "&page={$page}"));
            });

            $response = collect($searchResults)->map(function ($response) {
                return $response
                    ->json()['results'];
            })->collapse();
            return ($this->transformSearchResult($response));
        }
    }

    private function transformSearchResult($searchResults)
    {

        return $searchResults->map(function ($result) {


            return [
                'id' => $result['id'],
                'poster_path' => $this->image($result['media_type'], $result),
                'route' =>   $this->route($result['media_type'], $result),
                'title' =>  $this->title($result['media_type'], $result),
                'media_type' => $result['media_type'],
                'release_date' => $this->releaseDate($result['media_type'], $result),
                'vote_average' => $this->voteAverage($result['media_type'], $result),
                'language' => $this->language($result['media_type'], $result),
                'slug' => $this->slug($result['media_type'], $result),
            ];
        });
    }


    private function slug($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
            case  $mediaType == 'person':
                return  Str::of($result['name'])->slug('-');
            case $mediaType == 'movie':
                return  Str::of($result['title'])->slug('-');
                break;
            default:
                return null;
        }
    }


    private function image($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
            case $mediaType == 'movie':
                return 'https://image.tmdb.org/t/p/w342/' . $result['poster_path'];
                break;
            case  $mediaType == 'person':
                return 'https://image.tmdb.org/t/p/w342' . $result['profile_path'];
                break;
        }
    }

    private function title($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
            case  $mediaType == 'person':
                return $result['name'];
            case $mediaType == 'movie':
                return $result['title'];
                break;
            default:
                return null;
        }
    }

    private function releaseDate($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
                return  Carbon::parse($result['first_air_date'])->format(' Y');
            case $mediaType == 'movie':
                return  Carbon::parse($result['release_date'])->format(' Y');
                break;
            case $mediaType == 'person':
                return null;
                break;
            default:
                return null;
        }
    }


    private function voteAverage($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
            case $mediaType == 'movie':
                return  $result['vote_average'];
                break;
            case  $mediaType == 'person':
                return  $result['popularity'] . '%';
                break;
            default:
                return null;
        }
    }


    private function language($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
            case $mediaType == 'movie':
                return  $result['original_language'] ?? null;
                break;
            case  $mediaType == 'person':
                return  $result['known_for_department'] ?? null;
                break;
            default:
                return null;
        }
    }

    private function route($mediaType, $result)
    {
        switch ($mediaType) {
            case $mediaType == 'tv':
                return 'tv.show';
            case $mediaType == 'movie':
                return  'movie.show';
                break;
            case $mediaType == 'person':
                return 'actors.show';
                break;
            default:
                return null;
        }
    }
}
