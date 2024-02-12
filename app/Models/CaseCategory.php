<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CaseCategory extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'category_name',
    ];

    public function abuseCategories(): HasMany
    {
        return $this->hasMany(AbuseCategory::class);
    }

    public function caseProfiles(): HasMany
    {
        return $this->hasMany(CaseProfile::class);
    }
}
