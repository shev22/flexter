<?php

/**
 * 05.02.2024 9:20pm
 * Francis Okoroafor
 */

namespace App\Livewire\Traits;

use Carbon\Carbon;
use Illuminate\Support\Str;

trait FormatDataTrait
{

    public function formatData($media, $mediaType)
    {
        return (
            (collect($media))
            ->map(function ($media) use ($mediaType) {

                if (count($media) >= 14) {

                    if (isset($media['release_date'])) {
                        $release_date = $media['release_date'];
                    } elseif (isset($media['first_air_date'])) {
                        $release_date = $media['first_air_date'];
                    } else {
                        $release_date = 'Untitled';
                    }

                    if (isset($media['title'])) {
                        $title = $media['title'];
                    } elseif (isset($media['name'])) {
                        $title = $media['name'];
                    } else {
                        $title = 'Untitled';
                    }

                    if (isset($media['media_type'])) {
                        $media_type = $media['media_type'];
                    } else {
                        $media_type = $mediaType;
                    }


                    return collect($media)->merge([

                        'title' => $title,
                        'poster_path' => $media['poster_path']
                            ? 'https://image.tmdb.org/t/p/w500/' . $media['poster_path']
                            : 'https://fakeimg.pl/600x400/080505/4f4d4d?text=image&font=lobster',
                        'backdrop_path' => $media['backdrop_path'],
                        'genre_ids' => json_encode($media['genre_ids']),
                        // 'genre_ids' => json_encode(['genre' => preg_filter('/^/', '', $media['genre_ids'])]),
                        'vote_average' => round($media['vote_average'], 1),
                        'release_date' => Carbon::parse($release_date)->format('M , Y'),
                    ])->only([
                        'poster_path', 'id', 'name', 'title', 'vote_average', 'logo', 'genre_ids', 'overview', 'first_air_date', 'original_language', 'release_date', 'media_type', 'backdrop_path', 'popularity', 'vote_count'
                    ])->put('slug',   $this->slugify($title))
                        ->put('year', Carbon::parse($release_date)->format('Y'))
                        ->put('media_type',   $media_type)
                        ->put('created_at',  \Carbon\Carbon::now())
                        ->put('updated_at',  \Carbon\Carbon::now());
                }
            }));


    

        [
            'id' => $media['id'],
            'backdrop_path' => $media['backdrop_path'],
            'genre_ids' => json_encode($media['genre_ids']),
            'original_language' => $media['poster_path'],
            'overview' => $media['overview'],
            'popularity' => $media['popularity'],
            'poster_path'  => $media['poster_path']
                ? 'https://image.tmdb.org/t/p/w500/' . $media['poster_path']
                : 'https://fakeimg.pl/600x400/080505/4f4d4d?text=image&font=lobster',
            'release_date' => $media['release_date'],
            'title'  => $media['title'],
            'vote_average'  => $media['vote_average'],
            'vote_count'  => $media['vote_count'],
            'slug' => $media['slug'],
            'year'  => $media['year'],
            'media_type'  => $media['media_type'],
        ];
    }


    private  function slugify($title)
    {
        $text =  Str::of($title)->slug('-');

        if ($text == "") {
            return "*-*";
        }
        return $text;
    }
}
