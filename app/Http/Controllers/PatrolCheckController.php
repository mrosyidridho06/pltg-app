<?php

namespace App\Http\Controllers;

use App\Models\PatrolCheck;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PatrolCheckDetail;
use RealRashid\SweetAlert\Facades\Alert;

class PatrolCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patrol = PatrolCheckDetail::get();

        return view('laporan.patrol_check.index', compact('patrol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ptk = PatrolCheck::get();
        return view('laporan.patrol_check.create', compact('ptk'));
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
            'parameter' => ['required', 'string'],
            'satuan' => 'required',
        ]);

        PatrolCheck::create([
            'nomor' => $request->nomor,
            'parameter' => $request->parameter,
            'satuan' => $request->satuan,
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
            PatrolCheckDetail::create([
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

        PatrolCheckDetail::create([
            'tanggal_terbit' => $request->tanggal_terbit,
            'nomor_dokumen' => $request->nomor_dokumen,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PatrolCheck  $patrolCheck
     * @return \Illuminate\Http\Response
     */
    public function show(PatrolCheck $patrolCheck)
    {
        //
    }

    public function isi($slug)
    {
        $patrol = PatrolCheck::orderBy('nomor', 'asc')->get();
        $patroldetail = PatrolCheckDetail::where('nomor_dokumen', $slug)->first();

        return view('laporan.patrol_check.isi', compact('patrol', 'patroldetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PatrolCheck  $patrolCheck
     * @return \Illuminate\Http\Response
     */
    public function edit(PatrolCheck $patrolCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PatrolCheck  $patrolCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PatrolCheck $patrolCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PatrolCheck  $patrolCheck
     * @return \Illuminate\Http\Response
     */
    public function destroy(PatrolCheck $patrolCheck)
    {
        //
    }
}
