<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieModel extends Model
{
    use HasFactory;
    protected $fillable = [ 'backdrop_path', 'logo', 'genre_ids', 'id', 'original_language', 'overview', 'popularity', 'poster_path', 'release_date','title', 'vote_average', 'vote_count', 'slug','year','media_type',];

    // protected $casts = ['genre_ids' => 'array'];
}
