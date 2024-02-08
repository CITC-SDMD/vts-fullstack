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
}
