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
        $schedule->command('reservations:send-check-in-reminders')->everyMinute();
    $schedule->command('queue:work --stop-when-empty')->everyMinute();
    }

    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
