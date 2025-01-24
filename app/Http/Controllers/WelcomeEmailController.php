<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class WelcomeEmailController extends Controller
{
    public function sendWelcomeEmail()
    {
        $toEmail = 'd.shved.wrk@gmail.com';
        $message = 'Welcome to Gourmania';
        $subject = 'Welcome Email';

        $response = Mail::to($toEmail)->send(new WelcomeEmail($message, $subject));

        dd($response);
    }
}
