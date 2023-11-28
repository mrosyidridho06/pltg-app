<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChecklistStopMesin extends Model
{
    use HasFactory;

    protected $table = 'checklist_stop_mesins';

    protected $fillable = ['area', 'target', 'nomor'];
}
