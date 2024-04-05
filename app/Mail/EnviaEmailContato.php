<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviaEmailContato extends Mailable
{
    use Queueable, SerializesModels;

    public $content;
    public $subject;

    /**
     * Crie uma nova instância de mensagem.
     *
     * @return void
     */
    public function __construct($content, $subject)
    {
        $this->content = $content;
        $this->subject = $subject;
    }

    /**
     * Construa a mensagem
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('envios@gdebrasil.com.br', 'Artemidas')
            ->view('emails.emailContato')
            ->with(['mensagem' => $this->content]);
    }
}