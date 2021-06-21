<?php

namespace CapeAndBay\Paramount\Services;

use Ixudra\Curl\Facades\Curl;

class LocationsService
{
    protected $api_key;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;

    }

    public function getLocations(string $region_code)
    {
        $results = false;

        $url = config('paramount.urls.api') . '/Legacy/PAC/API/GetLocations/' . $this->api_key . '/' . $region_code;

        $response = Curl::to($url)
            ->asJson(true)
            ->get();

        if ($response) {
            $results = $response;
        }

        return $results;
    }

    public function getMemberships(string $club_id)
    {
        $results = false;

        $url = config('paramount.urls.api') . '/Legacy/PAC/API/GetMemberships/' . $this->api_key;

        $payload = ['ClubId' => $club_id];

        $response = Curl::to($url)
            ->withData($payload)
            ->asJson(true)
            ->post();

        if ($response) {
            $results = $response;
        }

        return $results;
    }

    public function getEmployees(string $club_id)
    {
        $results = false;

        $url = config('paramount.urls.api') . '/legacy/PAC/API/GetEmployees/' . $this->api_key;

        $payload = ['ClubId' => $club_id];

        $response = Curl::to($url)
            ->withData($payload)
            ->asJson(true)
            ->post();

        if ($response) {
            $results = $response;
        }

        return $results;
    }
    /**
     * Gets contracts matching a certain type for a given club.
     * @param string $club_id
     * @param string $contract_type
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetContractsByType(string $club_id, string $contract_type, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Contracts/{$contract_type}";
        $api_key = env('PARAMOUNT_API_KEY');

        $response = Curl::to($url)
            ->withContentType('application/json')
            ->withHeader("ClubAt: {$club_id}")
            ->withHeader("api-version: {$api_version}")
            ->withHeader("Authorization: Bearer {$api_key}")
            ->asJson(true)
            ->get();

        if ($response) {
            $results = $response;
        }

        return $results;
    }
}
