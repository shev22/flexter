<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Services\MediaBuffer5;


class buffer5 extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:buffer5';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';
    public function __construct(private MediaBuffer5 $buffer){ parent::__construct();}

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $time  = time();
        $this->buffer->buffer();
        echo (time() - $time) . 'to load movies MediaBuffer5<br>';
    }
}
