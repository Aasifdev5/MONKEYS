<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ReservationConfirmed extends Notification
{
    protected $reservation;

    /**
     * Create a new notification instance.
     *
     * @param  mixed  $reservation
     * @return void
     */
    public function __construct($reservation)
    {
        $this->reservation = $reservation;
    }

    /**
     * Determine the channels the notification should be sent on.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        // You can customize the email message as needed
        return (new MailMessage)
            ->subject('Reservation Confirmed')
            ->line('Your reservation has been confirmed!')
            ->line('Room: ' . $this->reservation->room->name)
            ->line('Date: ' . $this->reservation->date->format('F j, Y'))  // Format date
            ->line('Check-in: ' . $this->reservation->check_in->format('F j, Y, g:i A'))  // Format datetime
            ->line('Check-out: ' . $this->reservation->check_out->format('F j, Y, g:i A'))  // Format datetime
            ->action('View Reservation', url('/reservations/' . $this->reservation->id));  // Link to view reservation details
    }

    /**
     * Optionally, you can use a custom view for the email instead of using the default MailMessage.
     *
     * public function toMail($notifiable)
     * {
     *     return (new MailMessage)
     *         ->subject('Reservation Confirmed')
     *         ->view('emails.reservation.confirmed', ['reservation' => $this->reservation]);
     * }
     */
}
