<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BSDIsiDetail extends Model
{
    use HasFactory;

    protected $table = 'bsd_isidetail';

    protected $fillable = [
        'siap_operasi',
        'gangguan',
        'keterangan',
        'bsd_details_id',
        'black_start_diesels_id'
    ];
}
