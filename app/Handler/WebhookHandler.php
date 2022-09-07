<?php

namespace App\Handler;

use Spatie\WebhookClient\Jobs\ProcessWebhookJob;
use App\Events\PusherEvent;

class WebhookHandler extends ProcessWebhookJob
{
    public function handle()
    {
        event(new PusherEvent('new visitors'));
    }
}
