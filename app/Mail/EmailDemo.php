<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailDemo extends Mailable
{
    use Queueable, SerializesModels;

    protected $mailData;
    protected $subj;
    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mailData, $user= null, $subject = "New Coding Jobs")
    {
        $this->mailData = $mailData;
        $this->subj = $subject;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subj)
            ->view('Email.jobs')
            ->with(['jobs' => $this->mailData, 'user' => $this->user]);
    }
}
