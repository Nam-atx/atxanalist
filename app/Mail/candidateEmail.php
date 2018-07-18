<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class candidateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $from,$email,$company,$subject,$messagebody,$user;
        

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from,$email,$company,$subject,$messagebody,$user)
    {
        //

        $this->from=$from;
        $this->email=$email;
        $this->company=$company;
        $this->subject=$subject;
        $this->messagebody=$messagebody;
        $this->user=$user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('emails.candidate');
        return $this->subject($this->subject)->markdown('emails.candidate')->with(['message'=>$this->messagebody,'company'=>$this->company,'user'=>$this->user]);
    }
}
