<?php

namespace App\Repositories;

use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Models\CaseLog;

class CaseLogRepository implements CaseLogRepositoryInterface
{
    public function store(object $payload, $agencyId, $serviceId)
    {
        $user = auth()->user();
        $currentTimestamp = now();
        $year = $currentTimestamp->year;
        $month = $currentTimestamp->month;
        $day = $currentTimestamp->day;
        $millisecond = $currentTimestamp->millisecond;
        $caseLogNumber = $year . $month . $day . $millisecond;

        $log = new CaseLog();
        $log->case_profile_id = $payload->case_profile_id;
        $log->referred_by_id = $user->agency_id;
        $log->referral_agency_id = $agencyId;
        $log->service_id = $serviceId;
        $log->case_log_number = 'CASELOG #' . $caseLogNumber;
        $log->save();

        return $log->fresh();
    }

    public function showByCaseProfileId(int $caseProfileId)
    {
        return CaseLog::with([
            'referredBy',
            'referredBy.agency',
            'referralAgency',
            'service',
        ])
            ->where('case_profile_id', $caseProfileId)
            ->orderBy('id', 'desc')
            ->paginate(config('pagination.shortPage'));
    }

    public function showByCaseProfileIdReferralAgencyIdServiceId(int $caseProfileId, int $agencyId, int $serviceId)
    {
        return CaseLog::where('case_profile_id', $caseProfileId)
            ->where('referral_agency_id', $agencyId)
            ->where('service_id', $serviceId)
            ->first();
    }

    public function showByUuid(string $uuid)
    {
        return CaseLog::with([
            'caseProfile',
            'caseProfile.caseCategory',
            'referredBy',
            'referredBy.agency',
            'referralAgency',
            'service',
            'assistanceLogs'
        ])
            ->where('uuid', $uuid)
            ->first();
    }
}
