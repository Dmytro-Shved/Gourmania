<?php

namespace App\Services;

interface SubscriberService
{
    public function subscribe(string $listId, string $email): bool;
}
