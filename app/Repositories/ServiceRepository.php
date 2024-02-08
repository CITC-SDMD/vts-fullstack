<?php

namespace App\Repositories;

use App\Interface\Repositories\ServiceRepositoryInterface;
use App\Models\Service;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function index()
    {
        return Service::all();
    }
}
