<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseLog extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'case_profile_id',
        'referred_by_id',
        'referral_agency_id',
        'service_id',
        'case_log_number',
    ];

    public function latestAssistanceLog()
    {
        return $this->hasOne(AssistanceLog::class)->latest('created_at');
    }

    public function caseProfile(): BelongsTo
    {
        return $this->belongsTo(CaseProfile::class);
    }

    public function referredBy(): BelongsTo
    {
        return $this->belongsTo(ReferralAgency::class);
    }

    public function referralAgency(): BelongsTo
    {
        return $this->belongsTo(ReferralAgency::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function assistanceLogs(): HasMany
    {
        return $this->hasMany(AssistanceLog::class);
    }
}
