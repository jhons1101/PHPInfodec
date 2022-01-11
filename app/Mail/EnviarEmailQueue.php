<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarEmailQueue extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title, $message)
    {
        $this->title = $title;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->message)
                    ->view('emails.enviarEmailPlantilla')
                    ->with([
                        'title' => $this->title,
                        'message' => $this->message
                    ]);
    }
}
