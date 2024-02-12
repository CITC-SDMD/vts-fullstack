<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Child extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'client_id',
        'firstname',
        'middlename',
        'lastname',
        'age',
        'civil_status',
        'educ_level',
    ];

    public function getFullNameAttribute()
    {
        return $this->firstname.' '.$this->middlename.' '.$this->lastname;
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
