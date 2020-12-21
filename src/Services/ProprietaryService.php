<?php

namespace CapeAndBay\Paramount\Services;

use Ixudra\Curl\Facades\Curl;

class ProprietaryService
{
    protected $api_key;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;

    }

    public function getLoadTemplates(array $payload)
    {
        $results = false;

        $payload['webPortalRowID'] = config('paramount.urls.web_portal_row_id');
        $url = config('paramount.urls.web-sales') . '/WebSales/LoadTemplates';

        $response = Curl::to($url)
            ->withData($payload)
            ->post();

        if ($response) {
            $results = $response;
        }

        return $results;
    }

    public function getStagingInfo(array $payload)
    {
        $results = false;

        $payload['webPortalRowID'] = config('paramount.urls.web_portal_row_id');
        $url = config('paramount.urls.web-sales') . '/WebSales/GetStagingInfo';

        $response = Curl::to($url)
            ->withData($payload)
            ->asJson(true)
            ->post();

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
}
