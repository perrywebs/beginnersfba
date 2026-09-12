<?php

namespace App\Jobs;

use App\Mail\AppMail;
use Illuminate\Bus\Queueable;
use App\Livewire\Auth\Booking;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $userEmail;
    public $subject;
    public $bodyUser;
    public $bodyAdmin;
    /**
     * Create a new job instance.
     */
    public function __construct($userEmail, $subject, $bodyUser, $bodyAdmin)
    {
        $this->userEmail = $userEmail;
        $this->subject = $subject;
        $this->bodyUser = $bodyUser;
        $this->bodyAdmin = $bodyAdmin;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // user email
        Mail::to($this->userEmail)->queue(new AppMail($this->subject, $this->bodyUser));

        // Admin email
        Mail::to(config('app.Admin_email'))->queue(new AppMail($this->subject, $this->bodyAdmin));
    }
}
