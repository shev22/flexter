<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActorModel extends Model
{
    use HasFactory;

    protected $fillable = [ 'id', 'name', 'profile_path', 'known_for', 'slug' ];


}
