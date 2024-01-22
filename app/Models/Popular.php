<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Popular extends Model
{
    use HasFactory;
     protected $fillable = [ 'adult', 'backdrop_path', 'genre_ids', 'id', 'original_language', 'original_title', 'overview', 'popularity', 'poster_path', 'release_date','title', 'video', 'vote_average', 'vote_count', ];

     protected $casts = ['genre_ids'=>'array'];
  

}
