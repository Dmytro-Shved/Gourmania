<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'email' => ['required', 'email']
        ]);

        // Set variables
        $email_address = $validated['email'];
        $list_id = config('services.mailchimp.list_id');

        $this->add_or_update_list_member($list_id, $email_address);

        return redirect()->route('home')->with('subscribed', 'Please check your email to confirm subscription.');
    }

    public function create_client()
    {
        $client = new ApiClient();

        $client->setConfig([
            'apiKey' => config('services.mailchimp.api_key'),
            'server' => config('services.mailchimp.server_prefix'),
        ]);

        return $client;
    }

    public function add_or_update_list_member($list_id, $email_address)
    {
        $client = $this->create_client();

        $subscriber_hash = md5(strtolower($email_address));

        $response = $client->lists->setListMember($list_id, $subscriber_hash, [
            "email_address" => $email_address,
            "status_if_new" => "pending",
        ]);
    }
}
