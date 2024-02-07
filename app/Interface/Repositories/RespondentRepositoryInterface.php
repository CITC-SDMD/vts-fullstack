<?php

namespace App\Interface\Repositories;

interface RespondentRepositoryInterface
{
    public function store(int $complainantId, int $respondentId);

    public function showRespondentIdArray(int $complainantId);
}
