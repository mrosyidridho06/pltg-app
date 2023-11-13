<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BSDIsiDetail extends Model
{
    use HasFactory;

    protected $table = 'bsd_isidetails';

    protected $fillable = [
        'black_start_diesels_id',
        'bsd_details_id',
        'siap_operasi',
        'gangguan',
        'keterangan'
    ];
}
