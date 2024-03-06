<?php

namespace App\Repositories;

use App\Interface\Repositories\CaseLogRepositoryInterface;
use App\Models\CaseLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CaseLogRepository implements CaseLogRepositoryInterface
{
    public function caseLogCount()
    {
        $currentYear = Carbon::now()->year;

        return CaseLog::whereYear('created_at', $currentYear)->count();
    }

    public function caseLogPerMonth()
    {
        return CaseLog::selectRaw('COUNT(*) as total_caselogs')
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total_caselogs')
            ->toArray();
    }

    public function store(object $payload, $agencyId, $serviceId)
    {
        $user = auth()->user();
        $currentTimestamp = now();
        $year = $currentTimestamp->year;
        $month = $currentTimestamp->month;
        $day = $currentTimestamp->day;
        $millisecond = $currentTimestamp->millisecond;
        $caseLogNumber = $year.$month.$day.$millisecond;

        $log = new CaseLog();
        $log->case_profile_id = $payload->case_profile_id;
        $log->referred_by_id = $user->agency_id;
        $log->referral_agency_id = $agencyId;
        $log->service_id = $serviceId;
        $log->case_log_number = 'CASELOG #'.$caseLogNumber;
        $log->save();

        return $log->fresh();
    }

    public function showByCaseProfileId(int $caseProfileId)
    {
        return CaseLog::with([
            'referredBy',
            'referralAgency',
            'service',
        ])
            ->where('case_profile_id', $caseProfileId)
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
            'referralAgency',
            'service',
            'assistanceLogs' => function ($query) {
                $query->orderBy('id', 'desc');
            },
        ])
            ->where('uuid', $uuid)
            ->first();
    }

    public function showById(int $caseLogId)
    {
        return CaseLog::with([
            'referredBy',
            'referralAgency',
        ])->findOrFail($caseLogId);
    }
}
