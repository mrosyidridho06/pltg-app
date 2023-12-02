<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckListStartMesinDetail extends Model
{
    use HasFactory;

    protected $table = 'check_list_start_mesin_details';

    protected $fillable =
                        [
                            'nomor_dokumen',
                            'tanggal_terbit',
                            'slug',
                            'revisi'
                        ];
}
