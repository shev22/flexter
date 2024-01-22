<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListModel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','backdrop_path', 'genre_ids', 'id',  'overview', 'poster_path', 'release_date','title', 'vote_average','slug', 'year', ];

    protected $casts = ['genre_ids'=>'array'];

}
