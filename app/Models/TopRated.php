<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopRated extends Model
{
    use HasFactory;
    protected $table = 'top_rated';
    public $incrementing = false;

    protected $fillable = [ 'id','backdrop_path', 'genre_ids', 'original_language', 'overview', 'popularity', 'poster_path', 'release_date','title', 'vote_average', 'vote_count', 'slug','year','media_type'];


    public function genre()
    {
        return $this->belongsToMany(Genre::class);
    }
}
