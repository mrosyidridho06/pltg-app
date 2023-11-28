<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckListStopMesinDetail extends Model
{
    use HasFactory;

    protected $table = 'check_list_stop_mesin_details';

    protected $fillable = ['nomor_dokumen', 'slug', 'tanggal_terbit', 'revisi'];
}
