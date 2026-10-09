<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private array $valid = [
        'name' => 'Priya',
        'email' => 'priya@example.com',
        'message' => 'Hi, I would like to discuss a CRM project.',
    ];

    public function test_a_valid_message_is_emailed_to_the_owner(): void
    {
        Mail::fake();

        $this->post(route('contact.send'), $this->valid)
            ->assertRedirect(route('home').'#contact')
            ->assertSessionHas('contact_sent');

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
            return $mail->hasTo(config('portfolio.email'))
                && $mail->hasReplyTo('priya@example.com')
                && $mail->messageText === $this->valid['message'];
        });
    }

    public function test_the_success_message_is_shown_after_sending(): void
    {
        Mail::fake();

        $this->followingRedirects()
            ->post(route('contact.send'), $this->valid)
            ->assertSee('Your message has been sent');
    }

    public function test_missing_fields_are_rejected(): void
    {
        Mail::fake();

        $this->post(route('contact.send'), ['name' => '', 'email' => 'not-an-email', 'message' => 'short'])
            ->assertRedirect(route('home').'#contact')
            ->assertSessionHasErrors(['name', 'email', 'message']);

        Mail::assertNothingSent();
    }

    public function test_spam_bots_filling_the_hidden_field_are_ignored(): void
    {
        Mail::fake();

        $this->post(route('contact.send'), $this->valid + ['website' => 'http://spam.example'])
            ->assertRedirect(route('home').'#contact')
            ->assertSessionHas('contact_sent');

        Mail::assertNothingSent();
    }

    public function test_a_mail_failure_shows_an_error_and_keeps_the_input(): void
    {
        Mail::shouldReceive('to')->andThrow(new \RuntimeException('SMTP down'));

        $this->post(route('contact.send'), $this->valid)
            ->assertRedirect(route('home').'#contact')
            ->assertSessionHas('contact_failed')
            ->assertSessionHasInput('message', $this->valid['message']);
    }

    public function test_too_many_messages_are_rate_limited(): void
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post(route('contact.send'), $this->valid);
        }

        $this->post(route('contact.send'), $this->valid)->assertStatus(429);
    }
}
