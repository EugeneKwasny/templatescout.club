<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
       $schedule
       ->command('theme_list:get')
       ->dailyAt('00:00')
       ->timezone('America/New_York')
       ->emailOutputOnFailure('e.kvasnyi@gmail.com');

       $schedule
       ->command('set_theme:tags')
       ->dailyAt('00:20')
       ->timezone('America/New_York')
       ->emailOutputOnFailure('e.kvasnyi@gmail.com');

       $schedule
       ->command('theme_item:update')
       ->dailyAt('00:30')
       ->timezone('America/New_York')
       ->emailOutputOnFailure('e.kvasnyi@gmail.com');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
