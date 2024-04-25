<?php

namespace App\Interface\Repositories;

interface ImportRepositoryInterface
{
    public function import(object $payload);
}
