<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'nama_shift',
        'shift_awal',
        'shift_akhir',
    ];

    public function beritaAcara()
    {
        return $this->hasMany(BeritaAcara::class);
    }
}
