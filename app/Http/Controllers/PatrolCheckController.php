<?php

namespace App\Http\Controllers;

use App\Models\PatrolCheck;
use Illuminate\Http\Request;

class PatrolCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('laporan.patrol_check.index');
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
     * @param  \App\Models\PatrolCheck  $patrolCheck
     * @return \Illuminate\Http\Response
     */
    public function show(PatrolCheck $patrolCheck)
    {
        //
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
