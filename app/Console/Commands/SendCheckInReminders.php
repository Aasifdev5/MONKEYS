<?php

namespace App\Console\Commands;

use App\Mail\CheckInReminder;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendCheckInReminders extends Command
{
    protected $signature = 'reservations:send-check-in-reminders';
    protected $description = 'Envía recordatorios de check-in 24 horas antes';

    public function handle()
    {
        $tomorrow = now()->addDay()->toDateString();
        $reservations = Reservation::where('date', $tomorrow)
            ->where('payment_status', 'confirmed')
            ->get();

        foreach ($reservations as $reservation) {
            Mail::to($reservation->email)->queue(new CheckInReminder($reservation));
        }

        $this->info('Recordatorios de check-in enviados exitosamente.');
    }
}
