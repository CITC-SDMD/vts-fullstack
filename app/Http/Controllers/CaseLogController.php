<?php

namespace App\Http\Controllers;

use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Interface\Repositories\CaseProfileRepositoryInterface;
use Illuminate\Http\Request;

class CaseLogController extends Controller
{
    private $caseLogRepository;

    private $caseProfileRepository;

    public function __construct(
        CaseLogRepositoryInterface $caseLogRepository,
        CaseProfileRepositoryInterface $caseProfileRepository
    ) {
        $this->middleware('auth');
        $this->caseLogRepository = $caseLogRepository;
        $this->caseProfileRepository = $caseProfileRepository;
    }

    public function store(Request $request)
    {
        $caseProfile = $this->caseProfileRepository->showByCaseProfileId($request->case_profile_id);
        if (count($caseProfile->caseLogs) == 0) {
            $this->caseProfileRepository->updateAssessedBy($caseProfile->id);
        }

        foreach ($request->referral_agency_id as $agencyId) {
            foreach ($request->service_id as $serviceId) {
                $log = $this->caseLogRepository->showByCaseProfileIdReferralAgencyIdServiceId($request->case_profile_id, $agencyId, $serviceId);
                if (! $log) {
                    $this->caseLogRepository->store($request, $agencyId, $serviceId);
                }
            }
        }

        return back();
    }

    public function show(string $uuid)
    {
        $caseLog = $this->caseLogRepository->showByUuid($uuid);

        return view('cases.case-log', [
            'caselog' => $caseLog,
        ]);
    }
}
