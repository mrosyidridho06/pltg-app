<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckListStopMesinIsiDetail extends Model
{
    use HasFactory;

    protected $table = 'check_list_stop_mesin_isi_details';

    protected $fillable = ['checklist_id', 'detail_id', 'ok', 'not_ok', 'keterangan'];

    public function checklist()
    {
        return $this->belongsTo(ChecklistStopMesin::class);
    }

    public function detail()
    {
        return $this->belongsTo(CheckListStopMesinDetail::class);
    }
}
