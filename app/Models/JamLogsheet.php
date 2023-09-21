<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamLogsheet extends Model
{
    use HasFactory;

    protected $table ='jam_logsheets';

    protected $fillable = [
        'jam', 'logsheet_id'
    ];

    public function logsheet()
    {
        return $this->belongsTo(Logsheet::class);
    }
}
