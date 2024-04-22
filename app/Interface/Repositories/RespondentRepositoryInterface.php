<?php

namespace App\Interface\Repositories;

interface RespondentRepositoryInterface
{
    public function store(int $complainantId, int $respondentId);

    public function showRespondentIdArray(int $complainantId);

    public function showClientIdsArray();

    public function showRespondentIdsArray();

    public function showByComplainantIdRespondentId(int $complainantId, int $respondentId);
}
