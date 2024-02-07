<?php

namespace App\Repositories;

use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Models\CaseProfile;

class CaseProfileRepository implements CaseProfileRepositoryInterface
{
    public function index()
    {
        return CaseProfile::paginate(config('pagination.paginate'));
    }

    public function showByClientId(int $clientId)
    {
        return CaseProfile::with([
            'caseCategory',
            'respondent',
        ])
            ->where('complainant_id', $clientId)
            ->paginate(config('pagination.shortPage'));
    }
}
