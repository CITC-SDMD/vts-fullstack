<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'brgy_id',
        'firstname',
        'middlename',
        'lastname',
        'contact_no',
        'birthdate',
        'sex',
        'age',
        'civil_status',
        'educ_attain',
        'home_address',
        'work_address',
        'occupation',
        'ethnicity',
        'is_4ps_beneficiary',
    ];

    protected $casts = [
        'is_4ps_beneficiary' => 'boolean',
    ];

    public function barangay(): BelongsTo
    {
        return $this->belongsTo(Barangay::class);
    }

    public function children(): HasMany
    {
        return $this->hasMany(Child::class);
    }

    public function caseProfiles(): HasMany
    {
        return $this->hasMany(CaseProfile::class);
    }
}
