<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistStartMesin extends Model
{
    use HasFactory;

    protected $table = 'checklist_start_mesins';
    protected $fillable =
                    [
                        'area',
                        'target',
                        'nomor'
                    ];

    public function isiDetail()
    {
        return $this->hasMany(CheckListStartMesinIsiDetail::class);
    }
}
