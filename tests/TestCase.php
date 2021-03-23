<?php

namespace RicorocksDigitalAgency\GoingPostal\Tests;

use Livewire\LivewireServiceProvider;
use RicorocksDigitalAgency\GoingPostal\Providers\GoingPostalServiceProvider;
use Spatie\LaravelRay\RayServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return [RayServiceProvider::class, GoingPostalServiceProvider::class, LivewireServiceProvider::class];
    }

}
