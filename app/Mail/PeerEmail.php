<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PeerEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $peer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($peer)
    {
        $this->peer=$peer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.PeerEmail');
    }
}
