<?php

declare(strict_types=1);

namespace AIArmada\FilamentAffiliateNetwork\Policies;

use AIArmada\AffiliateNetwork\Models\AffiliateOffer;
use Illuminate\Contracts\Auth\Access\Authorizable;

final class AffiliateOfferPolicy
{
    public function viewAny(Authorizable $user): bool
    {
        return false;
    }

    public function view(Authorizable $user, AffiliateOffer $offer): bool
    {
        return false;
    }

    public function create(Authorizable $user): bool
    {
        return false;
    }

    public function update(Authorizable $user, AffiliateOffer $offer): bool
    {
        return false;
    }

    public function delete(Authorizable $user, AffiliateOffer $offer): bool
    {
        return false;
    }

    public function deleteAny(Authorizable $user): bool
    {
        return false;
    }

    public function restore(Authorizable $user, ?AffiliateOffer $offer = null): bool
    {
        return false;
    }

    public function forceDelete(Authorizable $user, ?AffiliateOffer $offer = null): bool
    {
        return false;
    }
}
