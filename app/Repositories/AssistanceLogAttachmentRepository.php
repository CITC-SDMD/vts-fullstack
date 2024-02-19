<?php

namespace App\Repositories;

use App\Interface\Repositories\AssistanceLogAttachmentRepositoryInterface;
use App\Models\AssistanceLogAttachment;

class AssistanceLogAttachmentRepository implements AssistanceLogAttachmentRepositoryInterface
{
    public function showByUuid(string $uuid)
    {
        return AssistanceLogAttachment::where('uuid', $uuid)->first();
    }

    public function delete(string $uuid)
    {
        AssistanceLogAttachment::where('uuid', $uuid)->delete();
    }
}
