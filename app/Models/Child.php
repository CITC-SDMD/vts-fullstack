<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Child extends Model
{
    use HasFactory;

    protected $fillable = [
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
        return $this->firstname . ' ' . $this->middlename . ' ' . $this->lastname;
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
