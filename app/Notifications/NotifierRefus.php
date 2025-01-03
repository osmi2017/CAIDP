<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

use App\Tools\Globals; 

class NotifierRefus extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $data;
    private $demandeData;

    public function __construct($data, $demandeData=null)
    {
        $this->data = $data;
        $this->demandeData = $demandeData;
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
        return (new MailMessage)
                    ->subject('Refus de communication de document')
                    ->line('Bonjour, ')
                    ->attach(public_path().("/admin/decisions/".$this->findDecisonPDFName()))
                    ->line('Communication du document refusée');
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

    private function findDecisonPDFName(){
        $Globals = new Globals;
        $name =  $Globals->genererDecisonPDF($this->demandeData['libelle'], $this->demandeData['created_at'], $this->demandeData['id']);
        return $name;
        // dd($this->demandeData);
    }
}
