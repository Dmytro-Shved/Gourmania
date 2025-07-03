<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpSubscriberService implements SubscriberService
{
    protected ApiClient $client;

    public function __construct(ApiClient $client)
    {
        $this->client = $client;
    }

    public function subscribe(string $listId, string $email): bool
    {
        $hash = md5(strtolower($email));

        $this->client->lists->setListMember($listId, $hash, [
            'email_address' => $email,
            'status_if_new' => 'pending',
        ]);

        return true;
    }
}
