<?php

namespace CapeAndBay\Paramount;

use CapeAndBay\Paramount\Services\AppointmentService;
use CapeAndBay\Paramount\Services\LocationsService;

class Paramount
{
    protected $api_key;
    protected $locations, $appointments;

    public function __construct()
    {
        $this->api_key = config('paramount.paramount_api_key');
        $this->locations = new LocationsService($this->api_key);
        $this->appointments = new AppointmentService($this->api_key);
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

            default:
                $results = false;
        }

        return $results;
    }

}
