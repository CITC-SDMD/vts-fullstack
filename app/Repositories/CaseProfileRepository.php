<?php

namespace App\Repositories;

use App\Interface\Repositories\CaseProfileRepositoryInterface;
use App\Models\CaseProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CaseProfileRepository implements CaseProfileRepositoryInterface
{
    public function index()
    {
        return CaseProfile::with([
            'caseCategory',
            'complainant',
            'respondent',
            'abuseCategory',
            'abuseSubcategory',
        ])
            ->orderBy('id', 'desc')
            ->paginate(config('pagination.paginate'));
    }

    public function caseCount()
    {
        $currentYear = Carbon::now()->year;

        return CaseProfile::whereYear('created_at', $currentYear)->count();
    }

    public function casePerMonth()
    {
        return CaseProfile::selectRaw('COUNT(*) as total_cases')
            ->whereYear('created_at', now()->year)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('total_cases')
            ->toArray();
    }

    public function showByUuid(string $uuid)
    {
        return CaseProfile::where('uuid', $uuid)->first();
    }

    public function showByCaseProfileId(int $caseProfileId)
    {
        return CaseProfile::with(['caseLogs'])
            ->findOrFail($caseProfileId);
    }

    public function showByClientId(int $clientId)
    {
        return CaseProfile::with([
            'caseCategory',
            'respondent',
            'abuseCategory',
            'abuseSubcategory',
        ])
            ->where('complainant_id', $clientId)
            ->paginate(config('pagination.shortPage'));
    }

    public function store(object $payload, $abuseCategoryId = null, $abuseSubcategoryId = null)
    {
        $user = auth()->user();
        $currentTimestamp = now();
        $year = $currentTimestamp->year;
        $month = $currentTimestamp->month;
        $day = $currentTimestamp->day;
        $millisecond = $currentTimestamp->millisecond;
        $caseNumber = $year . $month . $day . $millisecond;

        $caseProfile = new CaseProfile();
        $caseProfile->case_category_id = $payload->case_category_id;
        $caseProfile->abuse_category_id = $abuseCategoryId;
        $caseProfile->abuse_subcategory_id = $abuseSubcategoryId;
        $caseProfile->complainant_id = $payload->complainant_id;
        $caseProfile->respondent_id = $payload->respondent_id;
        $caseProfile->received_by_id = $user->id;
        $caseProfile->relationship_id = $payload->relationship_id;
        $caseProfile->case_profile_id = 'CASE #' . $caseNumber;
        $caseProfile->others = $payload->others;
        $caseProfile->created_at = $payload->created_at;
        $caseProfile->save();

        return $caseProfile->fresh();
    }

    public function showByComplainantIdRespondentIdCaseCategoryId(int $complainantId, int $respondentId, int $caseCategoryId)
    {
        return CaseProfile::where('complainant_id', $complainantId)
            ->where('respondent_id', $respondentId)
            ->where('case_category_id', $caseCategoryId)
            ->first();
    }

    public function showByComplainantIdRespondentIdAbuseCategoryId(int $complainantId, int $respondentId, int $abuseCategoryId)
    {
        return CaseProfile::where('complainant_id', $complainantId)
            ->where('respondent_id', $respondentId)
            ->where('abuse_category_id', $abuseCategoryId)
            ->first();
    }

    public function showByClientIdRespondentIdAbuseCategoryIdAbuseSubcategoryId(
        int $clientId,
        int $respondentId,
        int $abuseCategoryId,
        int $abuseSubcategoryId
    ) {
        return CaseProfile::where('complainant_id', $clientId)
            ->where('respondent_id', $respondentId)
            ->where('abuse_category_id', $abuseCategoryId)
            ->where('abuse_subcategory_id', $abuseSubcategoryId)
            ->first();
    }

    public function updateAssessedBy(int $caseProfileId)
    {
        $user = auth()->user();

        $caseProfile = CaseProfile::findOrFail($caseProfileId);
        $caseProfile->assessed_by_id = $user->id;
        $caseProfile->save();

        return $caseProfile->fresh();
    }

    public function search(object $payload)
    {
        return CaseProfile::with([
            'complainant',
            'respondent',
            'caseCategory',
            'abuseCategory',
        ])
            ->where(function ($query) use ($payload) {
                $query->Where('case_profile_id', 'LIKE', "%$payload->search%");
            })
            ->orWhereHas('complainant', function ($query) use ($payload) {
                $query->where('firstname', 'LIKE', "%$payload->search%")
                    ->orWhere('middlename', 'LIKE', "%$payload->search%")
                    ->orWhere('lastname', 'LIKE', "%$payload->search%");
            })
            ->orWhereHas('respondent', function ($query) use ($payload) {
                $query->where('firstname', 'LIKE', "%$payload->search%")
                    ->orWhere('middlename', 'LIKE', "%$payload->search%")
                    ->orWhere('lastname', 'LIKE', "%$payload->search%");
            })
            ->orWhereHas('caseCategory', function ($query) use ($payload) {
                $query->where('category_name', 'LIKE', "%$payload->search%");
            })
            ->orWhereHas('abuseCategory', function ($query) use ($payload) {
                $query->where('abuse_type', 'LIKE', "%$payload->search%");
            })
            ->orderBy('id', 'desc')
            ->get();
    }
}
