<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishListModel extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','media_type', 'id', 'poster_path', 'release_date','title', 'vote_average','slug', ];


}
