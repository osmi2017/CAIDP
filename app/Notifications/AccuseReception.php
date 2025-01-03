<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

// use App\Http\Controllers\Organisme\DemandeController";
// use App\Tools\DateRewrite;
// use App\Tools\Globals;

class AccuseReception extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $Demande;
    public $delaisRequis;
    public $message;
    public $subject;
    public $Demandeur;

    public function __construct($Demande, $delaisRequis, $message=null, $subject="Accusé de reception", $Demandeur=null)
    {
        $this->Demande = $Demande;
        $this->delaisRequis = $delaisRequis;
        $this->message = $message;
        $this->subject = $subject;
        $this->Demandeur = $Demandeur;
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
        $subject = $this->subject;
        $Demandeur = $this->Demandeur;
        return (new MailMessage)
                    ->subject($this->subject)
                    ->view('notifications.accuseReception', compact('Demande', 'subject', 'notifiable', 'Demandeur'));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $data['etat'] = "success";
        $data['message'] = $this->message;;
        $data['numDemande'] = $this->Demande->numDemande;
        $data['libelle'] = $this->Demande->libelle;
        $data['organisme'] = $this->Demande->organisme->organisme;
        $data['delaisRequis'] = $this->delaisRequis;
        $data['dateDemande'] = $this->Demande->dateDemande;
        $data['requerant_id'] = $this->Demande->requerant_id;
        $data['demande_id'] = $this->Demande->id;
        $data['direction'] = $this->Demande->direction;
        $data['service'] = $this->Demande->service;
        $data['requerant_nom'] = $this->Demandeur ? $this->Demandeur->nom." ".$this->Demandeur->prenom :  $notifiable->requerant->nom." ".$notifiable->requerant->prenom;
        $data['requerant_contact'] = $this->Demandeur ? $this->Demandeur->contact : $notifiable->requerant->contact;
        $data['requerant_email'] = $this->Demandeur ? $this->Demandeur->email : $notifiable->requerant->email;
        return $data;
    }

    // public function rewriteData($data){
    //     $
    // }
}
