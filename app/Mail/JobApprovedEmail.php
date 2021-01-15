<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class JobApprovedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $job;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$job)
    {
        $this->user = $user;
        $this->job = $job;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(get_option('email_address'))->to($this->user->email)->subject("[".get_option('site_name')."] Approved your job")->markdown('emails.approved_job');

    }
}
