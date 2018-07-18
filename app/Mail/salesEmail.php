<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class salesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $from,$email,$employement,$subject,$comment,$user;
        

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from,$email,$employement,$subject,$comment,$user)
    {
        //

        $this->from=$from;
        $this->email=$email;
        $this->employement=$employement;
        $this->subject=$subject;
        $this->comment=$comment;
        $this->user=$user;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->subject($this->subject)->markdown('emails.sales')->with(['employement'=>$this->employement,'comment'=>$this->comment,'user'=>$this->user]);
    }
}
