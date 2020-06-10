<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $contenu;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contenu,$patient)
    {
        $this->contenu = $contenu;
        $this->patient = $patient;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.patient-email')->with('contenu',$this->contenu)->with('patient',$this->patient);
    }
}
