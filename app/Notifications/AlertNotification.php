<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AlertNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $Demande;
    public $req;
    public $orga;
    public $caidp;
    public function __construct($Demande, $req=null, $orga=null, $caidp=null)
    {
        $this->Demande = $Demande;
        $this->req = $req;
        $this->orga = $orga;
        $this->caidp = $caidp;
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
        $Demande = $this->Demande;
        $requerant = $this->req;
        $organisme = $this->orga;
        $caidp = $this->caidp;
        return (new MailMessage)
                    ->view('notifications.AlertNotification', compact('Demande', 'requerant', 'organisme', 'caidp', 'notifiable'))
                    ->subject("Expiration de delais de réponse");
                    // ->from();
                    
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
            //
        ];
    }
}
