<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\CaseLogRepositoryInterface;
use Illuminate\Http\Request;

class CaseLogController extends Controller
{
    private $caseLogRepository;

    public function __construct(CaseLogRepositoryInterface $caseLogRepository)
    {
        $this->caseLogRepository = $caseLogRepository;
    }

    public function store(Request $request)
    {
        foreach ($request->referral_agency_id as $agencyId) {
            foreach ($request->service_id as $serviceId) {
                $this->caseLogRepository->store($request, $agencyId, $serviceId);
            }
        }
    }
}
