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
        $schedule->command('app:buffer1')
        ->timezone('Europe/Minsk')
        ->dailyAt("10:45")
        ->appendOutputTo('scheduler.log');

        $schedule->command('app:buffer2')
            ->timezone('Europe/Minsk')
        ->dailyAt("10:12")
        ->appendOutputTo('scheduler.log');

        $schedule->command('app:buffer3')
            ->timezone('Europe/Minsk')
        ->dailyAt("10:21")
        ->appendOutputTo('scheduler.log');

        $schedule->command('app:buffer5')
            ->timezone('Europe/Minsk')
        ->dailyAt("10:30")
        ->appendOutputTo('scheduler.log');

        $schedule->command('app:buffer4')
            ->timezone('Europe/Minsk')
        ->dailyAt("10:54")
        ->appendOutputTo('scheduler.log');


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
