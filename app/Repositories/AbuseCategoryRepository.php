<?php

namespace App\Repositories;

use App\Interface\Repositories\AbuseCategoryRepositoryInterface;
use App\Models\AbuseCategory;

class AbuseCategoryRepository implements AbuseCategoryRepositoryInterface
{
    public function index()
    {
        return AbuseCategory::all();
    }
}
