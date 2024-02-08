<?php

namespace App\Interface\Repositories;

interface CaseLogRepositoryInterface
{
    public function store(object $payload, $agencyId, $serviceId);
}
