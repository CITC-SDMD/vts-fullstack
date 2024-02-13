<?php

namespace App\Repositories;

use App\Interface\Repositories\RespondentRepositoryInterface;
use App\Models\Respondent;

class RespondentRepository implements RespondentRepositoryInterface
{
    public function store(int $complainantId, int $respondentId)
    {
        $respondent = new Respondent();
        $respondent->complainant_id = $complainantId;
        $respondent->respondent_id = $respondentId;
        $respondent->save();

        return $respondent->fresh();
    }

    public function showRespondentIdArray(int $complainantId)
    {
        return Respondent::where('complainant_id', $complainantId)
            ->pluck('respondent_id');
    }

    public function showByComplainantIdRespondentId(int $complainantId, int $respondentId)
    {
        return Respondent::where('complainant_id', $complainantId)
            ->where('respondent_id', $respondentId)
            ->first();
    }
}
