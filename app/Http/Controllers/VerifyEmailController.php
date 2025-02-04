<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    // Verify Email Notice Handler
    public function verifyNotice()
    {
        return view('mail.verify-email');
    }

    // Email Verification Handler
    public function verifyEmail(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home');
    }

    // Resending the Verification Email
    public function verifyHandler(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    }
}
