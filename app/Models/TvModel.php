<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvModel extends Model
{
    use HasFactory;
    protected $fillable = [ 'backdrop_path', 'genre_ids', 'id', 'original_language', 'overview', 'popularity', 'poster_path', 'release_date','title', 'vote_average', 'vote_count', 'slug','year','media_type'];

}
