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
}
