<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Saisine;

class AlertOganismeSaisine extends Notification
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
    public $Document_Path;
    public $Decision_Path;

    public function __construct($Demande, $Saisine, $User)
    {
        $this->Demande = $Demande;
        $this->Saisine = $Saisine;
        $this->User = $User;
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
        $text = "L'une de vos demande a été l'objet d'une saisine";
        $objet = "Nouvelle saisine";
        $MailMessage = new MailMessage;
        $Informations = $this->Informations($Demande->id);
        
        $libelle = null;
        $Information = $Informations['Information'];
       
        // ======================== Joindre les documents ==========================
        if($Information){
          
            if($Information!=null){
                $libelle = $Information;
            }
        }
          /*  if($Informations->document){
                foreach($Information->document as $value){
                    $MailMessage->attach(public_path().$this->Document_Path.$value->document);
                }
            }

        }
        // ======================== Joindre les documents ==========================
        // ======================== Joindre la decision ==========================
       /* $Decision = $this->Decision($Demande->id);
        if($Decision){
            if($Decision->isDecision==1 && $Decision->notificationFile!=null){
                $MailMessage->attach(public_path().$this->Decision_Path.$Decision->notificationFile);
            }
        }*/
        // ======================== Joindre la decision ==========================

        

            $MailMessage->subject('Saisine')
                        ->view('notifications.notificationSaisine', compact('Demande', 'Saisine', 'Demandeur', 'text', 'objet', 'libelle'));

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
        //$data['requerant_nom'] = $this->User->requerant->nom." ".$this->User->requerant->prenom;
        //$data['requerant_contact'] = $this->User->requerant->contact;
        //$data['requerant_email'] = $this->User->requerant->email;
        return $data;
    }

    public function Informations($demandeId)
    {
        // Query the Saisine table for the specific demande_id
        $saisine = Saisine::where('demande_id', $demandeId)->first();
    
        if ($saisine) {
            return [
                'Information' => $saisine->resume, // Retrieve the 'resume' field
                'document' => $saisine->documents ?? [], // Add related documents if needed
            ];
        }
    
        // Default response if no saisine is found
        return [
            'Information' => 'Ceci doit être définie', // Default message
            'document' => [],
        ];
    }

}
