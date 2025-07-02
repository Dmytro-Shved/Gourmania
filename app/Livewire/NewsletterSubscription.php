<?php

namespace App\Livewire;

use Livewire\Component;
use MailchimpMarketing\ApiClient;

class NewsletterSubscription extends Component
{
    public string $api_key = '';
    public string $server_prefix = '';
    public string $list_id = '';
    public string $subscriber_hash = '';
    public string $email_address = '';


    public function mount()
    {
        $this->api_key = config('services.mailchimp.api_key');
        $this->server_prefix = config('services.mailchimp.server_prefix');
        $this->list_id = config('services.mailchimp.list_id');
    }

    public function subscribe()
    {
        // Validate email
        $this->validate([
            'email_address' => ['required', 'email']
        ]);

        // Initialize client
        // basic setConfig() code
        $client = $this->create_client();

        // Set subscriber hash
        $subscriber_hash = md5(strtolower($this->email_address));

        // Catch response to show message
        try {
            $response = $client->lists->setListMember(
                $this->list_id,
                $subscriber_hash, [
                    "email_address" => $this->email_address,
                    "status_if_new" => "pending"
                ]);

            if ($response->status === "pending") {
                // for pending
                session()->flash('success', 'Please check your email to confirm subscription.');
            } elseif ($response->status === "subscribed") {

                // for subscribed
                session()->flash('updated', "You're already subscribed! Your profile was updated");
            }

            $this->reset('email_address');

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            if (str_contains($errorMessage, "already exists")) {
                $this->addError('email_address', "You're already subscribed");
            } else {
                $this->addError('email_address', 'Error: ' . $errorMessage);
            }
        }
    }

    public function render()
    {
        return view('livewire.newsletter-subscription');
    }

    public function create_client()
    {
        $client = new ApiClient();

        $client->setConfig([
            'apiKey' => $this->api_key,
            'server' => $this->server_prefix,
        ]);

        return $client;
    }
}
