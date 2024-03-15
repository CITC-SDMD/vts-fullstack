<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Occupation extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'name',
    ];

    public function subOccupation(): HasOne
    {
        return $this->hasOne(Suboccupation::class);
    }
}
