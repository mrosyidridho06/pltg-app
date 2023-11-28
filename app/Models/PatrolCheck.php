<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatrolCheck extends Model
{
    use HasFactory;

    protected $table = 'patrol_checks';

    protected $fillable = [
        'parameter',
        'satuan',
        'nomor'
    ];
}
