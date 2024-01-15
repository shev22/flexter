<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('daily:movies-buffer')
        ->everyMinute()
        ->appendOutputTo('scheduler.log');

        $schedule->command('daily:series-buffer')
        ->everyMinute()
        ->appendOutputTo('scheduler.log');

        // $schedule->command('cache:daily')
        // ->everyMinute()
        // ->appendOutputTo('scheduler.log');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
