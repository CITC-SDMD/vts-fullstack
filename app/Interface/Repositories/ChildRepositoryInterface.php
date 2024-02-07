<?php

namespace App\Interface\Repositories;

interface ChildRepositoryInterface
{
    public function store(object $payload);

    public function showChildrenByComplainantId(int $clientId);
}
