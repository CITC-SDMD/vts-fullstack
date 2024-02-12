<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'service_type',
    ];

    public function caseLogs(): HasMany
    {
        return $this->hasMany(CaseLog::class);
    }
}
