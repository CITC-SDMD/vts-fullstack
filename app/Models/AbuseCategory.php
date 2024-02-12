<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbuseCategory extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'case_category_id',
        'abuse_type',
    ];

    public function caseCategory(): BelongsTo
    {
        return $this->belongsTo(CaseCategory::class);
    }
}
