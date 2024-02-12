<?php

namespace App\Models;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory, UsesUuid;

    protected $fillable = [
        'uuid',
        'brgy_code',
        'brgy_name',
        'dist_name',
        'cong_dist_name',
        'street_name',
    ];
}
