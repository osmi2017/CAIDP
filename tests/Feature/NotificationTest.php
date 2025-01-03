<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use App\Notifications\AlertOganismeSaisine;
use App\User;  // Correctly import the User model
use Tests\TestCase;
use App\Demande;
use App\Saisine;

class NotificationTest extends TestCase
{
    /**
     * Test that a mail notification is sent.
     *
     * @return void
     */
    public function test_mail_notification_is_sent()
    {
        // Fake mail sending
        Mail::fake();

        // Create user and trigger notification
        $user = factory(User::class)->create(); // Correct factory usage
        $demande = factory(Demande::class)->create();
        $saisine = factory(Saisine::class)->create();

        // Send the notification
        $user->notify(new AlertOganismeSaisine($demande, $saisine, $user));

        // Assert that the email notification was sent
        Mail::assertSent(AlertOganismeSaisine::class, function ($mail) use ($user) {
            return $mail->hasTo($user->email);
        });
    }

    /**
     * Test that the notification is sent to the database.
     *
     * @return void
     */
    public function test_notification_is_sent_to_database()
    {
        // Create user and trigger notification
        $user = factory(User::class)->create(); // Correct factory usage
        $demande = factory(Demande::class)->create();
        $saisine = factory(Saisine::class)->create();

        // Send the notification
        $user->notify(new AlertOganismeSaisine($demande, $saisine, $user));

        // Assert that the notification is in the database
        $this->assertDatabaseHas('notifications', [
            'type' => AlertOganismeSaisine::class,
            'notifiable_id' => $user->id,
            'notifiable_type' => 'App\\User', // Make sure this matches your notifiable type
        ]);
    }
}
