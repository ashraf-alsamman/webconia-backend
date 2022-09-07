<?php

 namespace App\Handler;
 use Spatie\WebhookClient\SignatureValidator\SignatureValidator ;

use Illuminate\Http\Request;
use Spatie\WebhookClient\Exceptions\InvalidConfig;
use Spatie\WebhookClient\WebhookConfig;

class SignatureValidate implements SignatureValidator
{
    public function isValid(Request $request, WebhookConfig $config): bool
    {
        $signature = $request->header('signature-header-name');
        if (! $signature) {
            return false;
        }

        $signingSecret =  $request->header('signing_secret');
        if (empty($signingSecret)) {
            throw InvalidConfig::signingSecretNotSet();
        }

        $computedSignature = hash_hmac('sha256', $request->getContent(), $signingSecret);

        return hash_equals($computedSignature, $computedSignature);
    }
}
