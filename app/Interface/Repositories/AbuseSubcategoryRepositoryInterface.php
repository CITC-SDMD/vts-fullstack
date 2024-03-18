<?php

namespace App\Interface\Repositories;

interface AbuseSubcategoryRepositoryInterface
{
    public function index();

    public function showById($abuseSubcategoryId);

    public function showManyByAbuseCategoryIdArray($abuseCategoryId);

    public function showManyByAbuseCategoryId($abuseCategoryId);
}
