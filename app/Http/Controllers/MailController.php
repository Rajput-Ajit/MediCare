<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class MailController extends Controller
{
    //
    function sendOtp($to, $otp, $subject, $name){
        Mail::to($to)->send(new WelcomeEmail($otp, $subject, $name));
    }
}
