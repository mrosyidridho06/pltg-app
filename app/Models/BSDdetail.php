<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BSDdetail extends Model
{
    use HasFactory;

    protected $table = 'bsd_details';
    protected $fillable = [
        'nomor_dokumen',
        'slug',
        'tanggal_terbit',
        'revisi',
        'siap_operasi',
        'gangguan',
        'keterangan',
        'rh_sebelum',
        'rh_setelah',
        'flowmeter_bbm',
        'catatan',
        'pelaksana_tes'
    ];

}
