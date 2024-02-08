<?php

namespace App\Repositories;

use App\Interface\Repositories\ReferralAgencyRepositoryInterface;
use App\Models\ReferralAgency;

class ReferralAgencyRepository implements ReferralAgencyRepositoryInterface
{
    public function index()
    {
        return ReferralAgency::all();
    }
}
