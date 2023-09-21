<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterLogsheet extends Model
{
    use HasFactory;

    protected $table='parameter_logsheets';

    protected $fillable = [
        'nama_parameter', 'jenis_logsheet_id'
    ];


    public function jenislogsheet()
    {
        return $this->belongsTo(JenisLogsheet::class, 'jenis_logsheet_id');
    }

    public function detailparameter()
    {
        return $this->hasMany(DetailParameterLogsheet::class, 'parameter_logsheet_id');
    }
}
