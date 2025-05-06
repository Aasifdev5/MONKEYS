<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        \App\Console\Commands\SendCheckInReminders::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('reservations:send-check-in-reminders')
                 ->dailyAt('00:00')
                 ->timezone('America/La_Paz');
        $schedule->command('queue:work --stop-when-empty')
                 ->everyFiveMinutes()
                 ->timezone('America/La_Paz');
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
