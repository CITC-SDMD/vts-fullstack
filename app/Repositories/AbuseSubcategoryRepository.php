<?php

namespace App\Repositories;

use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;
use App\Models\AbuseSubcategory;

class AbuseSubcategoryRepository implements AbuseSubcategoryRepositoryInterface
{
    public function index()
    {
        return AbuseSubcategory::all();
    }

    public function showById(int $abuseSubcategoryId)
    {
        return AbuseSubcategory::findOrFail($abuseSubcategoryId);
    }

    public function showManyByAbuseCategoryId($abuseCategoryIds)
    {
        return AbuseSubcategory::whereIn('abuse_category_id', $abuseCategoryIds)->get();
    }
}
