<?php

namespace App\Interface\Repositories;

interface AbuseSubcategoryRepositoryInterface
{
    public function index();

    public function showById(int $abuseSubcategoryId);

    public function showManyByAbuseCategoryId($abuseCategoryId);
}
