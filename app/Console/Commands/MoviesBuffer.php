<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Services\MovieBuffer;


class MoviesBuffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:movies-buffer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';



    public function __construct(private MovieBuffer $buffer){ parent::__construct();}



    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time  = time ();
      $this->buffer->bufferMovies();
   
        echo(time() - $time).'to load movies<br>';
    }
}
