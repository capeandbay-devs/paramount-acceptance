<?php

namespace capeandbay\Paramount\Tests;

use capeandbay\Paramount\Facades\Paramount;
use capeandbay\Paramount\ServiceProvider;
use Orchestra\Testbench\TestCase;

class ParamountTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }

    protected function getPackageAliases($app)
    {
        return [
            'paramount' => Paramount::class,
        ];
    }

    public function testExample()
    {
        $this->assertEquals(1, 1);
    }
}
