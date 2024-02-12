<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Respondent extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'complainant_id',
        'respondent_id',
    ];

    public function complainant(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function respondent(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
