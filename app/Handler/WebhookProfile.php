<?php

// namespace Spatie\WebhookClient\WebhookProfile;
namespace App\Handler;

use Illuminate\Http\Request;

interface WebhookProfile
{
    public function shouldProcess(Request $request): bool;
}