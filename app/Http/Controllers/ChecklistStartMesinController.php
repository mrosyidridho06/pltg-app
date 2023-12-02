<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChecklistStartMesin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CheckListStartMesinDetail;
use App\Models\CheckListStartMesinIsiDetail;
use App\Models\CheckListStopMesinIsiDetail;

class ChecklistStartMesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = CheckListStartMesinDetail::get();
        return view('laporan.checklist_startmesin.index', compact('start'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start = ChecklistStartMesin::get();
        return view('laporan.checklist_startmesin.create', compact('start'));
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
            'nomor' => 'required',
            'area' => ['required', 'string'],
            'target' => 'required',
        ]);

        ChecklistStartMesin::create([
            'nomor' => $request->nomor,
            'area' => $request->area,
            'target' => $request->target,
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
            CheckListStartMesinDetail::create([
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
            'ok.*' => 'required',
            'not_ok.*' => 'required',
            'keterangan.*' => 'nullable',
            'checklist_id' => 'required',
            'detail_id' => 'required',
        ]);

        $arr = $request->all();

        $data = $arr['checklist_id'];
        $ok = $arr['ok'];
        $not = $arr['not_ok'];
        $ket = $arr['keterangan'];
        $isi = $arr['detail_id'];

        $finalArray = array();
        // dd($arr);
        foreach($data as $key=>$item){
            array_push($finalArray, array(
                'ok'=> $ok[$key],
                'not_ok'=> $not[$key],
                'keterangan' => $ket[$key],
                'detail_id' => $isi[$key],
                'checklist_id' => $data[$key],
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
                )
            );
        }
        // dd($finalArray);

        CheckListStartMesinIsiDetail::insert($finalArray);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->route('start.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChecklistStartMesin  $checklistStartMesin
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $start = ChecklistStartMesin::orderBy('nomor', 'asc')->get();
        $startdetail = CheckListStartMesinDetail::where('nomor_dokumen', $slug)->first();
        $isidetail = CheckListStartMesinIsiDetail::where('detail_id', $startdetail->id)->with('checklist', 'detail')->get();
        // dd($start);

        return view('laporan.checklist_startmesin.show', compact('start', 'startdetail', 'isidetail'));
    }

    public function isi($slug)
    {
        $start = ChecklistStartMesin::orderBy('nomor', 'asc')->get();
        $startdetail = CheckListStartMesinDetail::where('nomor_dokumen', $slug)->first();

        return view('laporan.checklist_startmesin.isi', compact('start', 'startdetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ChecklistStartMesin  $checklistStartMesin
     * @return \Illuminate\Http\Response
     */
    public function edit(ChecklistStartMesin $checklistStartMesin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChecklistStartMesin  $checklistStartMesin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChecklistStartMesin $checklistStartMesin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ChecklistStartMesin  $checklistStartMesin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChecklistStartMesin $checklistStartMesin)
    {
        //
    }
}
