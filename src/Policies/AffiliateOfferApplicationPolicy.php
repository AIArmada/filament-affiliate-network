<?php

declare(strict_types=1);

namespace AIArmada\FilamentAffiliateNetwork\Policies;

use AIArmada\AffiliateNetwork\Models\AffiliateOfferApplication;
use Illuminate\Contracts\Auth\Access\Authorizable;

final class AffiliateOfferApplicationPolicy
{
    public function viewAny(Authorizable $user): bool
    {
        return false;
    }

    public function view(Authorizable $user, AffiliateOfferApplication $application): bool
    {
        return false;
    }

    public function create(Authorizable $user): bool
    {
        return false;
    }

    public function update(Authorizable $user, AffiliateOfferApplication $application): bool
    {
        return false;
    }

    public function delete(Authorizable $user, AffiliateOfferApplication $application): bool
    {
        return false;
    }

    public function deleteAny(Authorizable $user): bool
    {
        return false;
    }

    public function restore(Authorizable $user, ?AffiliateOfferApplication $application = null): bool
    {
        return false;
    }

    public function forceDelete(Authorizable $user, ?AffiliateOfferApplication $application = null): bool
    {
        return false;
    }
}
