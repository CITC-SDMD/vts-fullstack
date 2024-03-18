<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\AbuseSubcategoryRepositoryInterface;

class AbuseSubcategoryController extends Controller
{
    private $abuseSubcategoryRepository;

    public function __construct(AbuseSubcategoryRepositoryInterface $abuseSubcategoryRepository)
    {
        $this->middleware('auth');
        $this->abuseSubcategoryRepository = $abuseSubcategoryRepository;
    }

    public function show(int $abuseCategoryId)
    {
        return $this->abuseSubcategoryRepository->showManyByAbuseCategoryId($abuseCategoryId);
    }
}
