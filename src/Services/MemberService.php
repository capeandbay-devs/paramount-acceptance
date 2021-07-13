<?php

namespace CapeAndBay\Paramount\Services;

use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;


class MemberService
{
    protected $api_key;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;

    }

    /**
     * Gets contracts for a member
     * @param string $club_id
     * @param string $member_number
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetContracts(string $club_id, string $member_number, float $api_version = 1.0)
    {
        $results = false;

        //yes, the docs say https://{{URL}}/API/Members/{{ClubId}}/{{MembNum}}/Contracts
        //but we have to add "any random parameter" at the end because reasons
        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Members/{$club_id}/{$member_number}/Contracts/false";
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

    /**
     * Adds an array of contracts to a member
     * @param string $club_id
     * @param string $member_number
     * @param array $payload
     * @param float $api_version
     * @return false
     */
    public function AddContracts(string $club_id, string $member_number, array $payload, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.secure-api');
        $url = "{$base_url}/API/Transactions/{$club_id}/{$member_number}/Contracts";
        $api_key = env('PARAMOUNT_API_KEY');

        $response = Curl::to($url)
            ->withContentType('application/json')
            ->withHeader("ClubAt: {$club_id}")
            ->withHeader("api-version: {$api_version}")
            ->withHeader("Authorization: Bearer {$api_key}")
            ->withData($payload)
            ->asJson(true)
            ->post();

        if ($response) {
            $results = $response;
        }

        return $results;
    }

    /**
     * Gets a member's services
     * @param string $club_id
     * @param string $member_number
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetServices(string $club_id, string $member_number, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Members/{$club_id}/{$member_number}/Services";
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

    /**
     * Gets a member's billing details
     * @param string $club_id
     * @param string $member_number
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetBillingDetails(string $club_id, string $member_number, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Members/{$club_id}/{$member_number}/BillingDetails";
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

    /**
     * Gets a member's mailing address
     * @param string $club_id
     * @param string $member_number
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetAddress(string $club_id, string $member_number, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Members/{$club_id}/{$member_number}/Address";
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

    /**
     * Gets a member's phone numbers
     * @param string $club_id
     * @param string $member_number
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetPhone(string $club_id, string $member_number, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Members/{$club_id}/{$member_number}/Phone";
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
    /**
     * Gets a member's status information
     * @param string $club_id
     * @param string $member_number
     * @param float $api_version
     * @return mixed response object or false
     */
    public function GetStatus(string $club_id, string $member_number, float $api_version = 1.0)
    {
        $results = false;

        $base_url = config('paramount.urls.pacapi');
        $url = "{$base_url}/API/Members/{$club_id}/{$member_number}/Status";
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
