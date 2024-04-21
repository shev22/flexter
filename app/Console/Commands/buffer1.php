<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Services\MediaBuffer1;

class buffer1 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:buffer1';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    public function __construct(private MediaBuffer1 $buffer){ parent::__construct();}
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time  = time ();
        $this->buffer->buffer();
          echo(time() - $time).'to load movies MediaBuffer1<br>';
    }
}
