<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MachineIsRunning extends Mailable
{
    use Queueable, SerializesModels;

     /**
     * Build the message.
     *
     * @return $this
     */

    public function build()
    {
        return $this->subject('SFC-MS is running')->view('emails.reminder');
    }
}