<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssistanceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_log_id',
        'user_id',
        'description',
        'status',
    ];

    public function caseLog(): BelongsTo
    {
        return $this->belongsTo(CaseLog::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
