<?php

namespace App\Interface\Repositories;

interface CaseLogRepositoryInterface
{
    public function caseLogCount();

    public function caseLogPerMonth();

    public function store(object $payload, $agencyId, $serviceId);

    public function showByCaseProfileId(int $caseProfileId);

    public function showByCaseProfileIdReferralAgencyIdServiceId(int $caseProfileId, int $agencyId, int $serviceId);

    public function showByUuid(string $uuid);
}
