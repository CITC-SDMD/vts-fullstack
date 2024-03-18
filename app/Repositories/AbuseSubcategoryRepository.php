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

    public function showById($abuseSubcategoryId)
    {
        return AbuseSubcategory::where('id', $abuseSubcategoryId)->first();
    }

    public function showManyByAbuseCategoryIdArray($abuseCategoryIds)
    {
        return AbuseSubcategory::whereIn('abuse_category_id', $abuseCategoryIds)->get();
    }

    public function showManyByAbuseCategoryId($abuseCategoryId)
    {
        return AbuseSubcategory::where('abuse_category_id', $abuseCategoryId)->get();
    }
}
