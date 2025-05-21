<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('email.contact')
            ->with([
                'nombre' => $this->data['nombre_formulario'],
                'mail' => $this->data['mail_formulario'],
                'mensaje' => $this->data['mensaje_formulario'],
            ]);
    }
}


