<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyulangPembangkit extends Model
{
    use HasFactory;

    protected $table = 'penyulang_pembangkits';
    protected $fillable = ['parameter', 'satuan'];
}
