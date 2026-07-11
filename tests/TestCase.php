<?php

declare(strict_types=1);

namespace AIArmada\FilamentAffiliateNetwork\Tests;

use AIArmada\FilamentAffiliateNetwork\FilamentAffiliateNetworkServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            FilamentAffiliateNetworkServiceProvider::class,
        ];
    }
}
