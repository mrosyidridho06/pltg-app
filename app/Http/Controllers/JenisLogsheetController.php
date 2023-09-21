<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisLogsheet;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\JenisLogsheetDataTable;

class JenisLogsheetController extends Controller
{
    public function __construct(){
        $this->middleware('can: create logsheet, read logsheet')->only('create, read');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(JenisLogsheetDataTable $dataTable)
    {
        $this->authorize('create logsheet', 'read logsheet');

        $jenisLogsheet = JenisLogsheet::all();

        return view('master.jenis_logsheet.index', compact('jenisLogsheet'));
        // return $dataTable->render('master.jenis_logsheet.index');
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
        $request->validate([
            'jenis_logsheet' => 'required',
        ]);

        JenisLogsheet::create([
            'jenis_logsheet' => $request->jenis_logsheet,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisLogsheet  $jenisLogsheet
     * @return \Illuminate\Http\Response
     */
    public function show(JenisLogsheet $jenisLogsheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisLogsheet  $jenisLogsheet
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisLogsheet $jenisLogsheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisLogsheet  $jenisLogsheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisLogsheet $jenisLogsheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisLogsheet  $jenisLogsheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisLogsheet $jenisLogsheet)
    {
        //
    }
}
