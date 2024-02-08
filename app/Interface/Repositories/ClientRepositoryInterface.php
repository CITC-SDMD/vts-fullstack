<?php

namespace App\Interface\Repositories;

interface ClientRepositoryInterface
{
    public function index();

    public function search(object $payload);

    public function create(object $payload);

    public function showRespondents($respondentIds);

    public function showRespondentList($respondentIds);

    public function showByUuid(string $uuid);

    public function showByFullname(object $payload);

    public function update(object $payload, int $clientId);

    public function uploadMedia(object $payload, string $uuid);
}
