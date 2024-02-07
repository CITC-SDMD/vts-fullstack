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
        $caseProfile->case_code = $payload->case_code;
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
}
