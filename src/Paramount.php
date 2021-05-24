<?php

namespace CapeAndBay\Paramount;

use CapeAndBay\Paramount\Services\AppointmentService;
use CapeAndBay\Paramount\Services\CheckoutService;
use CapeAndBay\Paramount\Services\LocationsService;
use CapeAndBay\Paramount\Services\ProprietaryService;

class Paramount
{
    protected $api_key;
    protected $checkout, $locations, $appointments, $internal;

    public function __construct()
    {
        $this->api_key = config('paramount.paramount_api_key');
        $this->locations = new LocationsService($this->api_key);
        $this->appointments = new AppointmentService($this->api_key);
        $this->internal = new ProprietaryService($this->api_key);
        $this->checkout = new CheckoutService($this->api_key);
    }

    public function submit(string $resource, array $args = [])
    {
        switch($resource)
        {
            case 'InsertContracts':
                $results = $this->checkout->$resource($args);
                break;

            default:
                $results = false;
        }

        return $results;
    }

    public function retrieve(string $resource, array $args = [])
    {
        switch($resource)
        {
            case 'getLocations':
                $results = array_key_exists('region', $args)
                    ? $this->locations->$resource($args['region'])
                    : false;
                break;

            case 'getMemberships':
            case 'getMemberContracts':
                $results = array_key_exists('club_id', $args) && array_key_exists('member_number', $args)
                ? $this->locations->$resource($args['club_id'], $args['member_number'])
                : [];
                break;
            case 'getEmployees':
                $results = array_key_exists('club_id', $args)
                    ? $this->locations->$resource($args['club_id'])
                    : [];
                break;

            case 'getAppointments':
            case 'getFitnessManagerResources':
            case 'getAppointmentTypes':
            case 'bookAppointment':
                $results = $this->appointments->$resource($args);
                break;

            case 'getLoadTemplates':
            case 'getStagingInfo':
                $results = $this->internal->$resource($args);
                break;

            case 'GetSignaturePrompts':
                $results = $this->checkout->$resource($args);
                break;

            default:
                $results = false;
        }

        return $results;
    }

}
