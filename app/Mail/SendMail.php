<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    private $fields;

    /**
     * Create a new message instance.
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * @return SendMail
     */
    public function build()
    {
        return $this->view('mail.email',["fields" => $this->fields])
            ->from('laravellist@galambostamas.hu', 'Galambos Tamás')
            ->subject('Feladat változás');
    }
}
