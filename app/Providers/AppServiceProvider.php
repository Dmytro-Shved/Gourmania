<?php

namespace App\Providers;

use App\Services\MailchimpSubscriberService;
use App\Services\SubscriberService;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;
use MailchimpMarketing\ApiClient;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(ApiClient::class, function (): ApiClient{
            $client = new ApiClient();

            $client->setConfig([
                'apiKey' => config('services.mailchimp.api_key'),
                'server' => config('services.mailchimp.server_prefix'),
            ]);

            return $client;
        });

        $this->app->singleton(SubscriberService::class, MailchimpSubscriberService::class);
    }

    public function boot(): void
    {
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
            return (new MailMessage)
                ->subject('Verify Email Address')
                ->view('mail.email-verification-message', ['url' => $url]);
        });
    }
}
