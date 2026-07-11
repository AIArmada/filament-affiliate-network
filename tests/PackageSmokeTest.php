<?php

declare(strict_types=1);

use AIArmada\FilamentAffiliateNetwork\FilamentAffiliateNetworkPlugin;
use AIArmada\FilamentAffiliateNetwork\Tests\TestCase;

uses(TestCase::class)->group('filament-affiliate-network');

it('can resolve the plugin', function (): void {
    $plugin = app(FilamentAffiliateNetworkPlugin::class);

    expect($plugin)->toBeInstanceOf(FilamentAffiliateNetworkPlugin::class);
});
