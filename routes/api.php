<?php

use App\Http\Controllers\Api\V1\MailgunWebhookController;
use Illuminate\Support\Facades\Route;

Route::post('webhooks/mailgun', [MailgunWebhookController::class, 'handle']);
