<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailParameterLogsheet extends Model
{
    use HasFactory;

    protected $table = 'detail_parameter_logsheets';

    protected $fillable = [
        'detail_parameter', 'alarm','satuan', 'parameter_logsheet_id'
    ];

    public function parameter()
    {
        return $this->belongsTo(ParameterLogsheet::class);
    }
}
