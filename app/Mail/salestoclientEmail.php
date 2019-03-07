<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class salestoclientEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $replyTo,$email,$client,$subject,$message,$user;
        

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($replyTo,$email,$client,$subject,$message,$user)
    {
        //

        //$this->from=$from;
        $this->replyTo=$replyTo;
        $this->email=$email;
        $this->client=$client;
        $this->subject=$subject;
        $this->message=$message;
        $this->user=$user;       

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject($this->subject)->markdown('emails.salestoclient')->with(['client'=>$this->client,'message'=>$this->message,'user'=>$this->user]);
    }
}
