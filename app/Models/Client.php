<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Client extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, UsesUuid;

    protected $fillable = [
        'uuid',
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
        'suboccupation',
        'ethnicity',
        'is_4ps_beneficiary',
    ];

    protected $casts = [
        'is_4ps_beneficiary' => 'boolean',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('clientMedia')->useDisk('client');
    }

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->middlename.' '.$this->lastname;
    }

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

    public function respondents(): HasMany
    {
        return $this->hasMany(Respondent::class, 'complainant_id');
    }
}
