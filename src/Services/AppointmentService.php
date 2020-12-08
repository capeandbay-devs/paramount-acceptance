<?php

namespace CapeAndBay\Paramount\Services;

use Ixudra\Curl\Facades\Curl;

class AppointmentService
{
    protected $api_key;

    public function __construct(string $api_key)
    {
        $this->api_key = $api_key;
    }

    public function getAppointments(array $data, float $api_version = 1.0, int $resourceId = -1, int $duration = 15)
    {
        $results = false;

        $url = config('paramount.training.post.available_appointments');

        $response = Curl::to($url)
            ->withContentType('application/json')
            ->withHeader('ClubAt: ' . $data['club_id'])
            ->withHeader('api-version: ' . $api_version)
            ->withHeader('Authorization: Bearer ' . $this->api_key)
            ->withData([
                'ClubAt'          => $data['club_id'],
                'StartDate'       => $data['date'],
                'EndDate'         => $data['date'],
                'ResourceId'      => $resourceId,
                'Duration'        => $duration,
                'AppointmentType' => 'FM'
            ])
            ->asJson(true)
            ->post();

        if ($response)
        {
            $results = $response;
        }

        return $results;
    }

    public function getFitnessManagerResources(array $data, float $api_version = 1.0)
    {
        $results = false;

        $url = config('paramount.training.get.fm_resources');

        $response = Curl::to($url)
            ->withContentType('application/json')
            ->withHeader('ClubAt: ' . $data['ClubId'])
            ->withHeader('api-version: '.$api_version)
            ->withHeader('Authorization: Bearer ' . env('PARAMOUNT_API_KEY'))
            ->asJson(true)
            ->get();

        if ($response)
        {
            $results = $response;
        }

        return $results;
    }

    public function getAppointmentTypes(array $data)
    {
        $results = false;

        $url = config('paramount.training.get.appointment_types')."{$data['ClubId']}";

        $response = Curl::to($url)
            ->withContentType('application/json')
            ->asJson(true)
            ->get();

        if ($response)
        {
            $results = $response;
        }

        return $results;
    }

    public function bookAppointment(array $data)
    {
        $results = false;

        $url = config('paramount.training.post.book_appointment');

        if(env('APP_ENV') == 'production')
        {
            $response = Curl::to($url)
                ->withContentType('application/json')
                ->withData($data)
                ->asJson(true)
                ->post();
        }
        else
        {
            $response = mt_rand(10000000, 99999999);
        }

        if ($response)
        {
            $results = $response;
        }

        return $results;
    }
}
