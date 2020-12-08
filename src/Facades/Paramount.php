<?php

namespace capeandbay\Paramount\Facades;

use Illuminate\Support\Facades\Facade;

class Paramount extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'paramount';
    }
}
