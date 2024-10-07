<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotificacionMail extends Mailable
{
    use Queueable, SerializesModels;

    public $estudiante;
    public $mensaje;
    public $fechaEnvio;

    public function __construct($estudiante, $mensaje, $fechaEnvio)
    {
        $this->estudiante = $estudiante;
        $this->mensaje = $mensaje;
        $this->fechaEnvio = $fechaEnvio;
    }

    public function build()
    {
        return $this->subject('Notificación de Tarea')
                    ->view('emails.correo');
    }
}