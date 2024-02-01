<?php

namespace App\Interface\Repositories;

interface ClientRepositoryInterface
{
    public function index();

    public function create(object $payload);

    public function showById(int $clientId);

    public function showByFullname(object $payload);

    public function update(object $payload, int $clientId);
}
