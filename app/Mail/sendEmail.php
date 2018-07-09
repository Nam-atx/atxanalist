<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
class sendEmail extends Mailable
{
    use Queueable, SerializesModels;


    public $name;
    public $email;
    public $messagetemplates;
    public $message;
    public $titleofjob;
    
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$messagetemplates,$message,$titleofjob)
    {
        //
        $this->name=$name;
        $this->email=$email;
        $this->messagetemplates=$messagetemplates;
        $this->message=$message;
        $this->titleofjob=$titleofjob;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user.employment.mail');
    }
}
