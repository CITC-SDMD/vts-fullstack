<?php

namespace App\Interface\Repositories;

interface AssistanceLogAttachmentRepositoryInterface
{
    public function showByUuid(string $uuid);

    public function delete(string $uuid);
}
