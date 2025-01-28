<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use SerializesModels;

    public $messageData;

    public function __construct($messageData)
    {
        $this->messageData = $messageData;
    }

    public function build()
    {
        return $this->markdown('emails.contact-message')
            ->subject('New Contact Form Message');
    }
}
