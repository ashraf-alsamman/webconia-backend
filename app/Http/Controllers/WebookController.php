<?php

namespace App\Http\Controllers;

use App\Models\WebhookCall;

/**
 * WebhookController
 * 
 * Main controller for the webhook calls.
 * 
 * @author Ashraf Alsamman <ashraf.alsamman@gmail.com>
 */
class WebookController extends Controller
{
    /**
     * Get the latest visitors inserted by the webhook.
     *
     * @return void
     */
    function getVisitors()
    {
        $webhook = WebhookCall::getLatestWebhookCall();

        if ($webhook) {
            return response(json_decode($webhook, true)['payload']);
        }

        return response()->json(['error' => 'No data exist'], 500);
    }
}
