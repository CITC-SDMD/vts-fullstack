<?php

namespace App\Repositories;

use App\Interface\Repositories\CaseCategoryRepositoryInterface;
use App\Models\CaseCategory;

class CaseCategoryRepository implements CaseCategoryRepositoryInterface
{
    public function index()
    {
        return CaseCategory::all();
    }
}
