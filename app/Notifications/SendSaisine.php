<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Information;
use App\Document;
use App\Decision;
use App\Tools\Globals;

class SendSaisine extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $Demande;
    public $Saisine;
    public $User;
    public $auteur;
    public $Document_Path;
    public $Decision_Path;

    public function __construct($Demande, $Saisine, $User, $auteur=null)
    {
        $this->Demande = $Demande;
        $this->Saisine = $Saisine;
        $this->User = $User;
        $this->auteur = $auteur;
        $this->Document_Path = Globals::Document_Path();
        $this->Decision_Path = Globals::Decision_Path();
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
        $Saisine = $this->Saisine;
        $Demandeur = $this->User;
        $auteur = $this->auteur;
        $text = "Vous avez réçu une nouvelle saisine.";
        $objet = "Nouvelle saisine";
        $MailMessage = new MailMessage;
        $Informations = $this->Informations($Demande->id);
        $libelle = null;
        $Information = $Informations['Information'];
        // ======================== Joindre les documents ==========================
        if($Information){
            if($Information->information!=null){
                $libelle = $Information->information;
            }
            if($Information->document){
                foreach($Information->document as $value){
                    $MailMessage->attach(public_path().$this->Document_Path.$value->document);
                }
            }

        }
        // ======================== Joindre les documents ==========================
        // ======================== Joindre la decision ==========================
        $Decision = $this->Decision($Demande->id);
        if($Decision){
            if($Decision->isDecision==1 && $Decision->notificationFile!=null){
                $MailMessage->attach(public_path().$this->Decision_Path.$Decision->notificationFile);
            }
        }
        // ======================== Joindre la decision ==========================

        

            $MailMessage->subject('Saisine')
                        ->view('notifications.notificationSaisine', compact('Demande', 'Saisine', 'Demandeur', 'text', 'objet', 'libelle', 'auteur'));

            return $MailMessage;
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
        $data['requerant_nom'] = $this->User->requerant->nom." ".$this->User->requerant->prenom;
        $data['requerant_contact'] = $this->User->requerant->contact;
        $data['requerant_email'] = $this->User->requerant->email;
        return $data;
    }

    /**
    * Get the array of Documents or false
    *
    * @param $demande_id
    * @return array
    */ 

    public function Informations($demande_id){
        $Information = Information::where('demande_id', $demande_id)->with('Document')->first();
        if($Information){
            return compact('Information');
        }else{
            return false;
        }
    }


    /**
    * Get the array of Documents or false
    *
    * @param $demande_id
    * @return array
    */ 

    public function Decision($demande_id){
        return Decision::where('demande_id', $demande_id)->first();        
    }

    
}
