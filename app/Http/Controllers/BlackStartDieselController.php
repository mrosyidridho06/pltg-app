<?php

namespace App\Http\Controllers;

use App\Models\BSDdetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\JenisLogsheet;
use App\Models\BlackStartDiesel;
use RealRashid\SweetAlert\Facades\Alert;

class BlackStartDieselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jl = JenisLogsheet::all();
        $bsd = BSDdetail::get();

        return view('management_document.bsd.index', compact('jl', 'bsd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // dd($request);
        $request->validate([
            'tanggal_terbit' => ['required', 'date'],
            'nomor_dokumen' => ['required', 'string'],
        ]);

        try {
            BSDdetail::create([
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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlackStartDiesel  $blackStartDiesel
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $bsd = BSDdetail::where('nomor_dokumen', $slug)->first();
        // dd($bsd);

        return view('management_document.bsd.show', compact('bsd'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlackStartDiesel  $blackStartDiesel
     * @return \Illuminate\Http\Response
     */
    public function edit(BlackStartDiesel $blackStartDiesel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlackStartDiesel  $blackStartDiesel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlackStartDiesel $blackStartDiesel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlackStartDiesel  $blackStartDiesel
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlackStartDiesel $blackStartDiesel)
    {
        //
    }

    public function showDetail(BSDdetail $bsddetail)
    {
        //
    }

    public function updateDetail(Request $request, BSDdetail $bsddetail)
    {
        //
    }
}
