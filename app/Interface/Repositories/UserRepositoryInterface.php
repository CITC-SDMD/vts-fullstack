<?php

namespace App\Interface\Repositories;

interface UserRepositoryInterface
{
    public function index();

    public function showByAgencyId($agencyId);

    public function showAll();

    public function create(object $payload);

    public function showByUuid(string $uuid);

    public function showByEmail(string $email);

    public function update(object $payload, string $uuid);

    public function search(object $payload);
}
