<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Verified
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $name;
    public string $email;
    public string $siteUrl;

    /**
     * Create a new event instance.
     */
    public function __construct($name, $email, $siteUrl)
    {
        $this->name = $name;
        $this->email = $email;
        $this->siteUrl = $siteUrl;
    }
}
