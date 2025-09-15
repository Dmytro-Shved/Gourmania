<?php

namespace App\Listeners;

use App\Events\Verified;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class SendWelcomeEmailListener
{

    public function handle(Verified $event): void
    {
        Mail::to($event->email)->send(new WelcomeEmail($event->name, $event->siteUrl));
    }
}
