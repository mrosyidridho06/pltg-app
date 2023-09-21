<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisLogsheet extends Model
{
    use HasFactory;

    protected $table='jenis_logsheets';

    protected $fillable = ['jenis_logsheet'];

    public function parameterlogsheet()
    {
        return $this->hasMany(ParameterLogsheet::class);
    }

    public function patrolcheck()
    {
        return $this->hasMany(ParameterLogsheet::class);
    }
}
