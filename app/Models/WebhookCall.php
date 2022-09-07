<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Spatie\WebhookClient\WebhookConfig;
use Symfony\Component\HttpFoundation\HeaderBag;
use Spatie\WebhookClient\Models\WebhookCall as SpatieWebhookCall;
use App\Validators\WebhookValidator;

/**
 * Class WebhookCall
 * @package Spatie\WebhookClient\Models
 *
 * @property-read int $id
 * @property string $name
 * @property array|null $headers
 * @property array|null $payload
 * @property array|null $exception
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall query()
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall wherePayload($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall whereException($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WebhookCall whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class WebhookCall extends SpatieWebhookCall
{
    public $guarded = [];

    protected $casts = [
        'headers' => 'array',
        'payload' => 'array',
        'exception' => 'array',
    ];

    public static function storeWebhook(WebhookConfig $config, Request $request): SpatieWebhookCall
    {
        
        WebhookValidator::validate($request->all());

        $headers = SpatieWebhookCall::headersToStore($config, $request);

        return SpatieWebhookCall::create([
            'name' => $config->name,
            'url' => $request->fullUrl(),
            'headers' => $headers,
            'payload' => $request->input(),
        ]);
    }

    public static function headersToStore(WebhookConfig $config, Request $request): array
    {
        $headerNamesToStore = $config->storeHeaders;

        if ($headerNamesToStore === '*') {
            return $request->headers->all();
        }

        $headerNamesToStore = array_map(
            fn (string $headerName) => strtolower($headerName),
            $headerNamesToStore,
        );

        return collect($request->headers->all())
            ->filter(fn (array $headerValue, string $headerName) => in_array($headerName, $headerNamesToStore))
            ->toArray();
    }

    /**
     * Get header bag
     *
     * @return HeaderBag
     */
    public function headerBag(): HeaderBag
    {
        return new HeaderBag($this->headers ?? []);
    }

    public function headers(): HeaderBag
    {
        return $this->headerBag();
    }

    /**
     *
     * @return WebhookCall
     */
    public static function getLatestWebhookCall(): WebhookCall
    {
      return self::orderBy('id', 'desc')->first();
    }
}
