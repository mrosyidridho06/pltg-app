<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logsheet extends Model
{
    use HasFactory;

    protected $table = 'logsheets';

    protected $fillable = [
        'nomor_dokumen', 'tanggal_terbit', 'jenis_logsheet_id'
    ];

    /**
     * Get the user that owns the Logsheet
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jenisLogsheet()
    {
        return $this->belongsTo(JenisLogsheet::class);
    }

    public function parameterlogsheet()
    {
        return $this->belongsTo(ParameterLogsheet::class);
    }
}
