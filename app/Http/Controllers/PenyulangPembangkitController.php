<?php

namespace App\Http\Controllers;

use App\Models\PenyulangPembangkit;
use Illuminate\Http\Request;

class PenyulangPembangkitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('management_document.data_penyulangpembangkit.index');
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
     * @param  \App\Models\PenyulangPembangkit  $penyulangPembangkit
     * @return \Illuminate\Http\Response
     */
    public function show(PenyulangPembangkit $penyulangPembangkit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PenyulangPembangkit  $penyulangPembangkit
     * @return \Illuminate\Http\Response
     */
    public function edit(PenyulangPembangkit $penyulangPembangkit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PenyulangPembangkit  $penyulangPembangkit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PenyulangPembangkit $penyulangPembangkit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PenyulangPembangkit  $penyulangPembangkit
     * @return \Illuminate\Http\Response
     */
    public function destroy(PenyulangPembangkit $penyulangPembangkit)
    {
        //
    }
}
