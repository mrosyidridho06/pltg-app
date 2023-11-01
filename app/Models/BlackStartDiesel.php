<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackStartDiesel extends Model
{
    use HasFactory;

    protected $table = 'black_start_diesels';

    protected $fillable = [
        'nama_alat',
        'penunjukan_meter'
    ];

}
