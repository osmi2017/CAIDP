<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;


class AccuseReceptionSaisne extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $Demande;
    public $Saisine;
    public $auteur;
    public $auteurSaisine;

    public function __construct($Demande, $Saisine, $auteur=null, $auteurSaisine=null)
    {
        $this->Demande = $Demande;
        $this->Saisine = $Saisine;
        $this->auteur = $auteur;
        $this->auteurSaisine = $auteurSaisine;
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
        if($notifiable->email!=null){
            $Demande = $this->Demande;
            $Saisine = $this->Saisine;
            $auteur = $this->auteur;
            $Demandeur = $notifiable;
            $objet = $this->auteurSaisine!=1 ? "Nouvelle saisine" : "Accusé de réception";
            $text = "Bonjour ".$notifiable->requerant->civilite." ".$notifiable->requerant->nom." ".$notifiable->requerant->prenom. ",  votre Saisine a bel et bien été reçue par la la CAIDP. Veuillez trouver dans le tableau ci-dessous le recapitulatif.";
            return (new MailMessage)
                        ->subject('Accusé de réception')
                        ->view('notifications.notificationSaisine', compact('Demande', 'Saisine', 'Demandeur','text', 'objet', 'auteur'));
        }
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
        $data['numDemande'] = $this->Demande->numDemande;
        $data['libelle'] = $this->Demande->libelle;
        $data['demande_id'] = $this->Demande->id;
        $data['motif'] = $this->Saisine->motif;
        $data['created_at'] = $this->Saisine->created_at;
        $data['numSaisine'] = $this->Saisine->numSaisine;
        $data['requerant_nom'] = $notifiable->requerant->nom." ".$notifiable->requerant->prenom;
        $data['requerant_contact'] = $notifiable->requerant->contact;
        $data['requerant_email'] = $notifiable->requerant->email;
        return $data;
    }

    /**
    * Get the array of Documents or false
    *
    * @param $demande_id
    * @return array
    */ 

    // public function Informations($demande_id){
    //     $Information = Information::where('demande_id', $demande_id)->first();
    //     if($Information){
    //         $Document = Document::where('information_id', $Information->id)->get();
    //         compact('Information', 'Document');
    //     }else{
    //         return false;
    //     }
    // }
}
