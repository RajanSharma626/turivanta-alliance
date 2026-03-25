<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendApplicationMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    public $user;
    public $application;
    public $files;

    /**
     * Create a new job instance.
     */
    public function __construct($user, $application, $files = [])
    {
        $this->user = $user;
        $this->application = $application;
        $this->files = $files;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        \Illuminate\Support\Facades\Mail::to(config('mail.doc_mail'))
            ->send(new \App\Mail\MembershipApplicationSubmitted($this->user, $this->application, $this->files));
    }
}
