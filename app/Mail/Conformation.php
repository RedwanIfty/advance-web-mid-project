<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Conformation extends Mailable
{
    use Queueable, SerializesModels;
    public $sub;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sub,$body)
    {
        $this->sub=$sub;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('mails.confirmation')
        ->with('body',$this->body)
        ->subject($this->sub);
    }
}
