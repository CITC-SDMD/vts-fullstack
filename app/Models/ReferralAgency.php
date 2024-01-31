<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReferralAgency extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_name',
    ];

    public function case_logs(): HasMany
    {
        return $this->hasMany(CaseLog::class);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
