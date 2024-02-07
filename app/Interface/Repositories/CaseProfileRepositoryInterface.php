<?php

namespace App\Interface\Repositories;

interface CaseProfileRepositoryInterface
{
    public function index();

    public function showByClientId(int $clientId);
}
