<?php

namespace App\Http\Controllers;

use App\Models\Logsheet;
use Illuminate\Http\Request;

class LogsheetController extends Controller
{
    public function __construct(){
        $this->middleware('can: create logsheet, read logsheet')->only('create, read');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('read logsheet', 'create logsheet');

        $logsheets = Logsheet::all();

        return view('logsheet.index', compact('logsheets'));
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
     * @param  \App\Models\Logsheet  $logsheet
     * @return \Illuminate\Http\Response
     */
    public function show(Logsheet $logsheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logsheet  $logsheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Logsheet $logsheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logsheet  $logsheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logsheet $logsheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logsheet  $logsheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logsheet $logsheet)
    {
        //
    }
}
