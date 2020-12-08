<?php

namespace CapeAndBay\Paramount\Services;

use Ixudra\Curl\Facades\Curl;

class ProspectsService
{
    protected $api_key;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
    }

    public function prospect(array $payload)
    {
        $results = false;

        $url = config('paramount.urls.pulse.post.prospect');

        $response = Curl::to($url)
            ->withData($payload)
            ->asJson(true)
            ->post();

        if ($response) {
            $results = $response;
        }

        return $results;
    }
}
