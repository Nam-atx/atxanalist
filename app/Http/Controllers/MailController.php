<?php

namespace App\Http\Controllers;


use App\Mail\sendEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mail()
    {
    	Mail::to('junaid@atxlearning.com')->send(new sendEmail());
    	
    }
}
