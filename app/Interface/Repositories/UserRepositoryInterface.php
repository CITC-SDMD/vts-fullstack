<?php

namespace App\Interface\Repositories;

interface UserRepositoryInterface
{
    public function index();

    public function create(object $payload);

    public function showById(int $userId);

    public function showByEmail(string $email);

    public function update(object $payload, int $userId);
}
