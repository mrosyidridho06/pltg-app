<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackStartDiesel extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal', 'jam', 'informasi', 'shift_id', 'user_id'
    ];

}
