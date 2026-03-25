<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Application;

class MembershipApplicationSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $application;
    public $files;

    public function __construct(User $user, Application $application, $files = [])
    {
        $this->user = $user;
        $this->application = $application;
        $this->files = $files;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Membership Application: ' . $this->application->application_no . ' (' . $this->user->name . ')',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application_submitted',
        );
    }

    public function attachments(): array
    {
        $attachments = [];

        foreach ($this->files as $name => $file) {
            if ($file instanceof \Illuminate\Http\UploadedFile) {
                $attachments[] = Attachment::fromPath($file->getRealPath())
                    ->as($file->getClientOriginalName())
                    ->withMime($file->getClientMimeType());
            }
        }

        return $attachments;
    }
}
