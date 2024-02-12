<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'relationship_type',
    ];
}
