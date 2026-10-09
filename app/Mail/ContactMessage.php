<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * A message sent through the contact form on the portfolio.
 */
class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $senderName,
        public string $senderEmail,
        public string $messageText,
    ) {}

    /**
     * Replying to the email goes straight to the visitor.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [new Address($this->senderEmail, $this->senderName)],
            subject: 'Portfolio contact: '.$this->senderName,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'mail.contact-message',
        );
    }
}
