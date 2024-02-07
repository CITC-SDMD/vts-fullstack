<?php

namespace App\Repositories;

use App\Interface\Repositories\RelationshipRepositoryInterface;
use App\Models\Relationship;

class RelationshipRepository implements RelationshipRepositoryInterface
{
    public function index()
    {
        return Relationship::all();
    }
}
