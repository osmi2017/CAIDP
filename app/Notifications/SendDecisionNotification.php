<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Http\Controllers\InformationController;
use App\Tools\Globals;
// use App\Demande;


class SendDecisionNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public $Demande;
    public $Decision;
    public $Orgnanisme;
    public $Globals;
    public function __construct($Demande,$Decision, $Orgnanisme)
    {
        // dd($Demande);
        $this->Demande = $Demande;
        $this->Decision = $Decision;
        $this->Orgnanisme = $Orgnanisme;
        $this->Globals = new Globals;
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
        $MailMessage = new MailMessage;
        $information = $this->demandeDocument();
        if($information){
            foreach ($this->demandeDocument() as $value) {
               $MailMessage->attach(public_path().'/documents/'.$value->document);
            }
        }
                if($this->Decision['notificationFile']!=null){
                    $MailMessage->attach(public_path().$this->Globals::Decision_Path().$this->Decision['notificationFile']);
                }else{
        // dd($notifiable->email);
                    $MailMessage->attach(public_path().$this->Globals::Decision_Path().$this->findDecisonPDFName().".pdf");
                }

        $MailMessage->subject('Notification de décision')
                    ->success()
                    ->from($this->Orgnanisme->email, $this->Orgnanisme->organisme)
                    ->greeting('Bonjour, ')
                    ->line('Veuillez trouvez ci-joint la réponse suite à votre demande d\'accès à l\'information portant le libellé'.$this->Demande->libelle);
                    // dd($this->Decision['notificationFile']);
        return $MailMessage;
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
            'message' => 'Vous avez reçu une notification relative à votre demande portant le libellé '.$this->Demande->libelle,
            'etat'=>'info',
            'id'=> $this->Demande->id
        ];
    }

    private function findDecisonPDFName(){
        $Globals = new Globals;
        $name =  $Globals->genererDecisonPDF($this->Demande['libelle'], $this->Demande['created_at'], $this->Demande['id']);
        return $name;
        // dd($this->demandeData);
    }

    public function demandeDocument(){
        $InformationController = new InformationController;
        $back =  $InformationController->InformationDemande($this->Demande->id);
        return $back;
        
    }
}
