<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    use HasFactory;
    protected $fillable = [ 'repository', 'quantity', 'duration' ,'date', 'error_message', 'status', ];
}
