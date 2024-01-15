<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChecklistFirePump;
use App\Models\ChecklistFirepumpDetail;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\ChecklistFirepumpIsiDetail;

class ChecklistFirePumpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fire = ChecklistFirepumpDetail::get();
        return view('management_document.firepump.index', compact('fire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fire = ChecklistFirePump::get();
        return view('management_document.firepump.create', compact('fire'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'parameter' => ['required', 'string'],
        ]);

        ChecklistFirePump::create([
            'parameter' => $request->parameter,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    public function storeDetail(Request $request)
    {
        $request->validate([
            'tanggal_terbit' => 'required',
            'nomor_dokumen' => ['required', 'string'],
        ]);

        try {
            ChecklistFirepumpDetail::create([
                'tanggal_terbit' => $request->tanggal_terbit,
                'slug' => Str::slug($request->nomor_dokumen),
                'nomor_dokumen' => $request->nomor_dokumen,
            ]);

            Alert::toast('Data Berhasil Ditambah', 'success');
            return redirect()->back();
        } catch(\Exception $e){
            Alert::toast('Nomor Dokumen Sudah ada', 'error');
            return redirect()->back();
        }

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    public function storeIsiDetail(Request $request)
    {
        $request->validate([
            'jockey_pump_normal*' => 'required',
            'jockey_pump_rusak*' => 'required',
            'fire_pump_normal*' => 'required',
            'fire_pump_rusak*' => 'required',
            'diesel_pump_normal*' => 'required',
            'diesel_pump_rusak*' => 'required',
            'catatan*' => 'required',
            'checklist_id' => 'required',
            'detail_id' => 'required',
        ]);

        $arr = $request->all();

        $data = $arr['checklist_id'];
        $isi = $arr['detail_id'];
        $jpn = $arr['jockey_pump_normal'];
        $jpr = $arr['jockey_pump_rusak'];
        $fpn = $arr['fire_pump_normal'];
        $fpr = $arr['fire_pump_rusak'];
        $dpn = $arr['diesel_pump_normal'];
        $dpr = $arr['diesel_pump_rusak'];
        $cat = $arr['catatan'];

        $finalArray = array();
        // dd($arr);
        foreach($data as $key=>$item){
            array_push($finalArray, array(
                'jockey_pump_normal'=> $jpn[$key],
                'jockey_pump_rusak'=> $jpr[$key],
                'fire_pump_normal'=> $fpn[$key],
                'fire_pump_rusak'=> $fpr[$key],
                'diesel_pump_normal'=> $dpn[$key],
                'diesel_pump_rusak'=> $dpr[$key],
                'detail_id' => $isi[$key],
                'checklist_id' => $data[$key],
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
                )
            );
        }
        // dd($finalArray);

        ChecklistFirepumpIsiDetail::insert($finalArray);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->route('firepump.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChecklistFirePump  $checklistFirePump
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $fire = ChecklistFirePump::orderBy('nomor', 'asc')->get();
        $firedetail = ChecklistFirepumpDetail::where('nomor_dokumen', $slug)->first();
        $isidetail = ChecklistFirepumpIsiDetail::where('detail_id', $firedetail->id)->with('checklist', 'detail')->get();
        // dd($start);

        return view('laporan.checklist_firepump.show', compact('fire', 'firedetail', 'isidetail'));
    }

    public function isi($slug)
    {
        $fire = ChecklistFirePump::orderBy('id', 'asc')->get();
        $firedetail = ChecklistFirepumpDetail::where('nomor_dokumen', $slug)->first();

        return view('laporan.checklist_.isi', compact('fire', 'firedetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChecklistFirePump  $checklistFirePump
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistFirePump $checklistFirePump)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChecklistFirePump  $checklistFirePump
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChecklistFirePump $checklistFirePump)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistFirePump  $checklistFirePump
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistFirePump $checklistFirePump)
    {
        //
    }
}
