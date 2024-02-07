<?php

namespace App\Repositories;

use App\Interface\Repositories\ChildRepositoryInterface;
use App\Models\Child;

class ChildRepository implements ChildRepositoryInterface
{
    public function store(object $payload)
    {
        $child = new Child();
        $child->client_id = $payload->client_id;
        $child->firstname = $payload->firstname;
        $child->middlename = $payload->middlename;
        $child->lastname = $payload->lastname;
        $child->age = $payload->age;
        $child->civil_status = $payload->civil_status;
        $child->educ_level = $payload->educ_level;
        $child->save();

        return $child->fresh();
    }

    public function showChildrenByComplainantId(int $clientId)
    {
        return Child::where('client_id', $clientId)
            ->paginate(config('pagination.shortPage'));
    }
}
