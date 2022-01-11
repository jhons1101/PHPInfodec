<?php

namespace App\Jobs;

use App\Mail\EnviarEmailQueue;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class EnviarEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $title;
    protected $emailUser;
    protected $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($title, $emailUser, $message)
    {
        $this->title = $title;
        $this->emailUser = $emailUser;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = new EnviarEmailQueue($this->title, $this->message);
        Mail::to($this->emailUser)->send($email);
        // Storage::append("archivo.txt", $this->title);
    }
}
