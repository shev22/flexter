<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = [ 'id','genre' ];

    public function toprated()
    {
        return $this->belongsToMany(TopRated::class);
    }

    public function movies()
    {
        return $this->belongsToMany(MovieModel::class);
    }

    
    public function tv()
    {
        return $this->belongsToMany(TvModel::class);
    }
}
