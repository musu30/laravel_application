<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StaffMail extends Mailable
{
    use Queueable, SerializesModels;
    public $detailes;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($detailes)
    {

        $this->detailes = $detailes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('mail from fitroad')
        ->from('anshadali.cloudbery@gmail.com')
        ->view('Mail.staffMail');
    }
}
