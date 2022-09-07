<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

/**
 * Validator for the Webhook
 */
class WebhookValidator
{
    /**
     * validate the incoming data/input from the request
     *
     * @param array $data
     * @return array
     */
    public static function validate(array $data): array
    {
        $rules = [
            '*.title' => 'required|string',
            '*.AnmeldungenHeute' => 'required|integer',
            '*.WebsiteBesucherHeute'    => 'required|integer',
            '*.users' => 'present|array',
            '*.users.*.name' => 'required|string',
            '*.users.*.surname' => 'required|string',
        ];

        $validator = Validator::make($data, $rules);
        
        return $validator->validate();
    }
}