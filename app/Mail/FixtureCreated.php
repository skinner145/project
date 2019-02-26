<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FixtureCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $fixture;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fixture)
    {
        $this->fixture = $fixture;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.fixture-created');
    }
}
