<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationConfirmed extends Notification
{
    protected $reservation;

    /**
     * Crear una nueva instancia de notificación.
     *
     * @param  mixed  $reservation
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Determinar los canales a través de los cuales se enviará la notificación.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Obtener la representación del correo de la notificación.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('¡Reserva Confirmada!')
            ->view('emails.reservation.confirmed', [
                'reservation' => $this->reservation,
            ]);
    }
}
