<?php

namespace App\Repositories;

use App\Interface\Repositories\OccupationRepositoryInterface;
use App\Models\Occupation;

class OccupationRepository implements OccupationRepositoryInterface
{
    public function index()
    {
        return Occupation::all();
    }
}
