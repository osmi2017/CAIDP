<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewAccount extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $pass;
    private $privilege;
    private $organisme;

    public function __construct($data, $privilege=null, $organisme)
    {
        $this->pass = $data;
        $this->privilege = $privilege;
        $this->organisme = $organisme;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if($notifiable->email!=null):
            $privilege = $this->privilege;
            $pass = $this->pass;
            $organisme = $this->organisme;
            return (new MailMessage)
                ->view('notifications.newAccount', compact('notifiable', 'privilege', 'pass', 'organisme'))
                ->subject("Inscription CAIDP");
        endif;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => 'Bonjour '.$notifiable->name.', bienvenu(e) sur la plateforme d\'accès à l\'information.',
            'etat'=>'success'
        ];
    }
}
