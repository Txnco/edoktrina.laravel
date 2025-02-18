<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\EmailService;
use Illuminate\Support\Facades\Mail;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function it_sends_verification_email_upon_registration()
    {
        // Mock the mailer
        Mail::fake();

        // Simulate the registration process
        $response = $this->post('/register', [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'john.doe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert that the response is a redirect to the verification page
        $response->assertRedirect('/verification');

        // Assert that an email was sent to the given user
        Mail::assertSent(VerificationEmail::class, function ($mail) {
            return $mail->hasTo('john.doe@example.com');
        });

        // Assert that the user was created in the database
        $this->assertDatabaseHas('users', [
            'email' => 'john.doe@example.com',
            'first_name' => 'John',
            'last_name' => 'Doe',
        ]);
    }
}
