<?php

namespace CapeAndBay\Paramount;

use CapeAndBay\Paramount\Services\ProspectsService;

class Pulse
{
    protected $api_key;
    protected $prospects;

    public function __construct()
    {
        $this->api_key = config('paramount.paramount_api_key');
        $this->prospects = new ProspectsService($this->api_key);
    }

    public function submit(string $resource, array $args = [])
    {
        switch($resource)
        {
            case 'prospect':
                $results = $this->prospects->$resource($args);
                break;

            default:
                $results = false;
        }

        return $results;
    }
}
