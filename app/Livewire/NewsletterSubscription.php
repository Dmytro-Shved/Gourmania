<?php

namespace App\Livewire;

use App\Services\SubscriberService;
use Livewire\Component;

class NewsletterSubscription extends Component
{
    // Users email address
    public string $email_address = '';

    public function subscribe(SubscriberService $subscriberService): void
    {
        try {
            // Strip whitespaces
            $this->email_address = trim($this->email_address);

            // Validate request
            $validated = $this->validate(['email_address' => 'required|email']);

            // Subscribe
            $subscriberService->subscribe(
                config('services.mailchimp.list_id'),
                $validated['email_address']
            );

            // Success message
            session()->flash('success', 'Success! Check your email inbox!');

            // Reset variable
            $this->reset('email_address');

        } catch (\Exception $e) {
            // Error message
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.newsletter-subscription');
    }
}
