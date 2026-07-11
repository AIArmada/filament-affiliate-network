<?php

declare(strict_types=1);

namespace AIArmada\FilamentAffiliateNetwork\Support;

use AIArmada\AffiliateNetwork\Enums\ApplicationStatus;
use AIArmada\AffiliateNetwork\Enums\OfferStatus;
use AIArmada\AffiliateNetwork\Models\AffiliateOffer;
use AIArmada\AffiliateNetwork\Models\AffiliateOfferApplication;
use AIArmada\AffiliateNetwork\Models\AffiliateOfferLink;
use AIArmada\AffiliateNetwork\Models\AffiliateSite;
use AIArmada\AffiliateNetwork\Models\ConversionLedger;
use AIArmada\CommerceSupport\Support\MoneyFormatter;
use AIArmada\CommerceSupport\Support\OwnerContext;

final class NetworkStatsAggregator
{
    /**
     * @return array{activeSites: int, activeOffers: int, pendingApplications: int, totalClicks: int, totalConversions: int, totalRevenue: int, conversionRate: float, revenueFormatted: string, revenueByCurrency: array<string, int>}
     */
    public static function aggregate(): array
    {
        return OwnerContext::withOwner(null, function (): array {
            $totalClicks = AffiliateOfferLink::withoutGlobalScope('owner_via_affiliate')->sum('clicks');
            $totalConversions = AffiliateOfferLink::withoutGlobalScope('owner_via_affiliate')->sum('conversions');
            $activeSites = AffiliateSite::query()->withoutOwnerScope()->whereNotNull('verified_at')->count();
            $activeOffers = AffiliateOffer::withoutGlobalScope('owner_via_site')->where('status', OfferStatus::Published)->count();
            $pendingApplications = AffiliateOfferApplication::withoutGlobalScope('owner_via_affiliate')->where('status', ApplicationStatus::Pending)->count();

            $revenueByCurrency = ConversionLedger::query()
                ->groupBy('currency')
                ->selectRaw('currency, sum(revenue) as total')
                ->pluck('total', 'currency')
                ->toArray();

            $totalRevenue = (int) ConversionLedger::query()->sum('revenue');

            $conversionRate = $totalClicks > 0
                ? round(($totalConversions / $totalClicks) * 100, 2)
                : 0;

            return [
                'activeSites' => $activeSites,
                'activeOffers' => $activeOffers,
                'pendingApplications' => $pendingApplications,
                'totalClicks' => $totalClicks,
                'totalConversions' => $totalConversions,
                'totalRevenue' => $totalRevenue,
                'conversionRate' => $conversionRate,
                'revenueFormatted' => MoneyFormatter::formatMinor($totalRevenue, 'USD'),
                'revenueByCurrency' => $revenueByCurrency,
            ];
        });
    }
}
