<?php

namespace App\Repositories;

use App\Interface\Repositories\AssistanceLogRepositoryInterface;
use App\Models\AssistanceLog;

class AssistanceLogRepository implements AssistanceLogRepositoryInterface
{
    public function store(object $payload)
    {
        $user = auth()->user();

        $assistance = new AssistanceLog();
        $assistance->case_log_id = $payload->case_log_id;
        $assistance->user_id = $user->id;
        $assistance->description = $payload->description;
        $assistance->status = $payload->status;
        $assistance->save();

        return $assistance->fresh();
    }
}
