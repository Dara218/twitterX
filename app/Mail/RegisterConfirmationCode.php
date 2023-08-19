<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterConfirmationCode extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

    public $confirmationCode;

    public function __construct($confirmationCode)
    {
        $this->confirmationCode = $confirmationCode;
    }

    public function build()
    {
        return $this->from('twitterX@gmail.com', 'TwitterX')
                    ->subject('TwitterX Registration code')
                    ->view('email.emailRegistration')
                    ->with('confirmationCode', $this->confirmationCode);
    }
}
