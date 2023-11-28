<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ChecklistStartMesin;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\CheckListStartMesinDetail;
use App\Models\CheckListStartMesinIsiDetail;

class ChecklistStartMesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = ChecklistStartMesin::get();
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
            'area' => $request->parameter,
            'target' => $request->satuan,
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
            'tanggal_terbit' => 'required',
            'nomor_dokumen' => ['required', 'string'],
        ]);

        CheckListStartMesinIsiDetail::create([
            'tanggal_terbit' => $request->tanggal_terbit,
            'nomor_dokumen' => $request->nomor_dokumen,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ChecklistStartMesin  $checklistStartMesin
     * @return \Illuminate\Http\Response
     */
    public function show(ChecklistStartMesin $checklistStartMesin)
    {
        //
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
