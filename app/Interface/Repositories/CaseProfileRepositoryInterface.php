<?php

namespace App\Interface\Repositories;

interface CaseProfileRepositoryInterface
{
    public function index();

    public function showByUuid(string $uuid);

    public function showByCaseProfileId(int $caseProfileId);

    public function showByClientId(int $clientId);

    public function store(object $payload, $abuseCategoryId = null, $abuseSubcategoryId = null);

    public function showByComplainantIdRespondentIdCaseCategoryId(int $complainantId, int $respondentId, int $caseCategoryId);

    public function showByComplainantIdRespondentIdAbuseCategoryId(int $complainantId, int $respondentId, int $abuseCategoryId);

    public function showByClientIdRespondentIdAbuseCategoryIdAbuseSubcategoryId(int $complainantId, int $respondentId, int $abuseCategoryId, int $abuseSubcategoryId);

    public function updateAssessedBy(int $caseProfileId);
}
