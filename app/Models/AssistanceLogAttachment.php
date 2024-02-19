<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class AssistanceLogAttachment extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, UsesUuid;

    protected $fillable = [
        'assistance_log_id',
        'file',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('assistanceMedia')->useDisk('client');
    }

    public function assistanceLog(): BelongsTo
    {
        return $this->belongsTo(AssistanceLog::class);
    }
}
