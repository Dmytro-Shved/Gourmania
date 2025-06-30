<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use MailchimpMarketing\ApiException;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // need to improve

        $request->validate([
            'email' => 'required|email',
        ]);

        $mailchimp = new ApiClient();

        $mailchimp->setConfig([
            'apiKey' => config('services.mailchimp.api_key'),
            'server' => config('services.mailchimp.server_prefix'),
        ]);

        $list_id = config('services.mailchimp.list_id');
        $email = $request->email;
        $subscriber_hash = md5(strtolower($email));

        try {
            $existing = $mailchimp->lists->getListMember($list_id, $subscriber_hash);

            $mailchimp->lists->updateListMember($list_id, $subscriber_hash, [
                'status' => 'subscribed',
            ]);

            return back()->with('success', "You're already subscribed. Your status was updated.");

        } catch (ApiException $e) {
            if ($e->getCode() == 404) {
                try {
                    $mailchimp->lists->addListMember($list_id, [
                        'email_address' => $email,
                        'status' => 'pending',
                    ]);

                    return back()->with('success', 'Please check your email to confirm subscription.');
                } catch (ApiException $ex) {
                    return back()->with('error', 'Error: ' . $ex->getMessage());
                }
            } else {
                return back()->with('error', 'Error: ' . $e->getMessage());
            }
        }
    }
}
