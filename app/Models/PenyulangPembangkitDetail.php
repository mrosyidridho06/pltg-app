<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyulangPembangkitDetail extends Model
{
    use HasFactory;

    protected $table = 'penyulang_pembangkit_details';
    protected $fillable = ['nomor_dokumen', 'slug', 'tanggal_terbit', 'revisi'];
}
