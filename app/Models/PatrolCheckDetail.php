<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatrolCheckDetail extends Model
{
    use HasFactory;

    protected $table = 'patrol_check_details';

    protected $fillable = ['tanggal_terbit', 'nomor_dokumen', 'slug', 'revisi'];


}
