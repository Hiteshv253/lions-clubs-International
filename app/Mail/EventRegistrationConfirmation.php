<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EventRegistrationConfirmation extends Mailable {

      use Queueable,
          SerializesModels;

      /**
       * Create a new message instance.
       */
      public function __construct() {
            //
      }

      /**
       * Get the message envelope.
       */
      public function envelope(): Envelope {
            return new Envelope(
                  subject: 'Event Registration Confirmation',
            );
      }

      /**
       * Get the message content definition.
       */
      public function content(): Content {
            return new Content(
                  view: 'view.name',
            );
      }

      /**
       * Get the attachments for the message.
       *
       * @return array<int, \Illuminate\Mail\Mailables\Attachment>
       */
      public function attachments(): array {
            return [];
      }

      public function build() {
            return $this->subject('Event Registration Confirmation')
                        ->view('emails.event_registration')
                        ->with(['data' => $this->data]);
      }
}
