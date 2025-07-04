<?php

namespace App\Livewire;

use App\Services\SubscriberService;
use Livewire\Component;

class NewsletterSubscription extends Component
{
    public string $email_address = '';

    public function subscribe(SubscriberService $subscriberService): void
    {
        try {
            $this->email_address = trim($this->email_address);

            $validated = $this->validate(['email_address' => 'required|email']);

            $subscriberService->subscribe(
                config('services.mailchimp.list_id'),
                $validated['email_address']
            );

            session()->flash('success', 'Success! Check your email inbox!');
            $this->reset('email_address');

        } catch (\Exception $e) {
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.newsletter-subscription');
    }
}
