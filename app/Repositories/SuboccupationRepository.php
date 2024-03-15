<?php

namespace App\Repositories;

use App\Interface\Repositories\SuboccupationRepositoryInterface;
use App\Models\Suboccupation;

class SuboccupationRepository implements SuboccupationRepositoryInterface
{
    public function index()
    {
        return Suboccupation::all();
    }
}
