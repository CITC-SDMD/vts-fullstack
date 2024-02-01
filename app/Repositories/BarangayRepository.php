<?php

namespace App\Repositories;

use App\Interface\Repositories\BarangayRepositoryInterface;
use App\Models\Barangay;

class BarangayRepository implements BarangayRepositoryInterface
{
    public function index()
    {
        return Barangay::all();
    }
}
