<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Relationship;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_category_id',
        'abuse_category_id',
        'complainant_id',
        'respondent_id',
        'received_by_id',
        'assessed_by_id',
        'relationship_id',
        'case_profile_id',
        'case_code',
    ];

    public function receivedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function relationship(): BelongsTo
    {
        return $this->belongsTo(Relationship::class);
    }

    public function assessedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function caseCategory(): BelongsTo
    {
        return $this->belongsTo(CaseCategory::class);
    }

    public function abuseCategory(): BelongsTo
    {
        return $this->belongsTo(AbuseCategory::class);
    }

    public function abuseSubcategory(): BelongsTo
    {
        return $this->belongsTo(AbuseSubcategory::class);
    }

    public function complainant(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function respondent(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function caseLogs(): HasMany
    {
        return $this->hasMany(CaseLog::class);
    }
}
