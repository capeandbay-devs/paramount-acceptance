<?php

namespace CapeAndBay\Paramount\Services;

use Ixudra\Curl\Facades\Curl;

class CheckoutService
{
    protected $api_key;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
    }

    public function GetSignaturePrompts(array $payload)
    {
        $results = false;

        $url = config('paramount.urls.web-sales') . '/WebSales/GetSignaturePrompts';

        $response = Curl::to($url)
            ->withData($payload)
            ->asJson(true)
            ->post();

        if ($response) {
            $results = $response;
        }

        return $results;
    }

    public function InsertContracts(array $payload)
    {
        $results = false;

        $url = 'https://dss.webfdm.com/legacy/PAC/API/InsertContracts/'.config('paramount.paramount_api_key');

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
