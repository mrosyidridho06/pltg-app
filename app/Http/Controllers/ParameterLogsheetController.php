<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisLogsheet;
use App\Models\ParameterLogsheet;
use RealRashid\SweetAlert\Facades\Alert;
use App\DataTables\ParameterLogsheetDataTable;

class ParameterLogsheetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ParameterLogsheetDataTable $dataTable)
    {

        $pr = ParameterLogsheet::with('detailparameter')->get();
        $jl = JenisLogsheet::get();

        return view('master.parameter_logsheet.index', compact('jl', 'pr'));

        // return $dataTable->render('master.parameter_logsheet.index', compact('jl'));
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
            'nama_parameter' => 'required',
            'jenis_logsheet_id' => 'required',
        ]);

        // dd($request);

        ParameterLogsheet::create([
            'nama_parameter' => $request->nama_parameter,
            'jenis_logsheet_id' => $request->jenis_logsheet_id,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
