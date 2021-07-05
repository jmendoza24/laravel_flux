<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EnvioFlux extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $attachment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, $attachment,$vista,$var1)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->attachment = $attachment;
        $this->vista = $vista;
        $this->var1 = $var1;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $email = $this->markdown($this->vista)
                ->from('ventas@fluxmetals.info')
                ->subject($this->subject)
                ->with('content', $this->content)
                ->with('var1', $this->var1);
         foreach ($this->attachment as $item) {
            $email->attach($item);
        }
        return $email;
    }
}

   