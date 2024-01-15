<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Services\TvBuffer;

class SeriesBuffer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:series-buffer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function __construct(private TvBuffer $buffer){ parent::__construct();}

    public function handle()
    { 
        
        $time  = time ();
        $this->buffer->bufferTv();
        echo(time() - $time).' to load series<br>';
      
    }
}
