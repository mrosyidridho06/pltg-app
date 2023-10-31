<?php

namespace App\Http\Controllers;

use App\Models\JenisLogsheet;
use App\Models\LogsheetHmitm2;
use Illuminate\Http\Request;

class LogsheetHmitm2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jl = JenisLogsheet::all();

        return view('laporan.hmitm2.index', compact('jl'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogsheetHmitm2  $logsheetHmitm2
     * @return \Illuminate\Http\Response
     */
    public function show(LogsheetHmitm2 $logsheetHmitm2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogsheetHmitm2  $logsheetHmitm2
     * @return \Illuminate\Http\Response
     */
    public function edit(LogsheetHmitm2 $logsheetHmitm2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogsheetHmitm2  $logsheetHmitm2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogsheetHmitm2 $logsheetHmitm2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogsheetHmitm2  $logsheetHmitm2
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogsheetHmitm2 $logsheetHmitm2)
    {
        //
    }
}
