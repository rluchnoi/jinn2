<?php

namespace App\Mail;

use App\Models\Film;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class FilmUploadedMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Home url
     */
    private string $url;

    /**
     * Create a new message instance.
     */
    public function __construct(
        private Film $film,
    ) {
        $this->url = 'http://jinn2.devs/';
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Film Uploaded Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.films.uploaded',
            with: [
                'url'      => $this->url,
                'filmName' => $this->film->name
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
