<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Events\Verified;

class EmailVerificationController extends Controller
{
    // Email Verification Notice
    public function notice()
    {
        return view('mail.verify-email');
    }

    // Email Verification Handler
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        // Send Welcome Email
        event(new Verified($request->user()->name, $request->user()->email));

        return redirect()->route('home');
    }

    // Email Verification Resending
    public function resend(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('email_verification_resend', "We've mailed you again");
    }
}
