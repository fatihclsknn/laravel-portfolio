<?php

namespace App\Mail\Contact;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AdminInfoMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact_message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact_message)
    {
        $this->contact_message = $contact_message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.contact.adminInfo');
    }
}
