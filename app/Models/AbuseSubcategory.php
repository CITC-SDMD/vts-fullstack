<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AbuseSubcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'abuse_category_id',
        'type',
    ];

    public function abuseCategory(): BelongsTo
    {
        return $this->belongsTo(AbuseCategory::class);
    }
}
