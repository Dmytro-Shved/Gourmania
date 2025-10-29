<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MailgunWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $timestamp = $request->input('signature.timestamp');
        $token = $request->input('signature.token');
        $receivedSignature = $request->input('signature.signature');

        $secretKey = config('services.mailgun.webhook_signing_key');

        $mySignature = hash_hmac('sha256', $timestamp . $token, $secretKey);

        if (! hash_equals($receivedSignature, $mySignature)) {
            abort(401, 'Invalid signature');
        }

        $event = $request->input('event-data.event');
        $severity  = $request->input('event-data.severity');
        $recipient  = $request->input('event-data.recipient');

        if ($event === "failed" && $severity === 'permanent'){
            User::where('email', $recipient)->delete();
        }
    }
}
