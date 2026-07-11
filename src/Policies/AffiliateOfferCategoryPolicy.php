<?php

declare(strict_types=1);

namespace AIArmada\FilamentAffiliateNetwork\Policies;

use AIArmada\AffiliateNetwork\Models\AffiliateOfferCategory;
use Illuminate\Contracts\Auth\Access\Authorizable;

final class AffiliateOfferCategoryPolicy
{
    public function viewAny(Authorizable $user): bool
    {
        return false;
    }

    public function view(Authorizable $user, AffiliateOfferCategory $category): bool
    {
        return false;
    }

    public function create(Authorizable $user): bool
    {
        return false;
    }

    public function update(Authorizable $user, AffiliateOfferCategory $category): bool
    {
        return false;
    }

    public function delete(Authorizable $user, AffiliateOfferCategory $category): bool
    {
        return false;
    }

    public function deleteAny(Authorizable $user): bool
    {
        return false;
    }

    public function restore(Authorizable $user, ?AffiliateOfferCategory $category = null): bool
    {
        return false;
    }

    public function forceDelete(Authorizable $user, ?AffiliateOfferCategory $category = null): bool
    {
        return false;
    }
}
