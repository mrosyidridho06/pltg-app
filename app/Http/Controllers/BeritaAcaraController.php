<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use App\Models\BeritaAcara;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaAcaraController extends Controller
{
    public function __construct(){
        $this->middleware('can: create beritaacara, read beritaacara')->only('create, read');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('create beritaacara', 'read beritaacara');

        $beritaacaras = BeritaAcara::all();
        $shifts = Shift::all();

        return view('berita_acara.index', compact('beritaacaras', 'shifts'));
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
            'tanggal' => 'required',
            'jam' => 'required',
            'shift_id' => 'required',
            'informasi' => 'required',
        ]);

        BeritaAcara::create([
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'shift_id' => $request->shift_id,
            'user_id' => Auth::user()->id,
            'informasi' => $request->informasi
        ]);

        return redirect()->with('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function show(BeritaAcara $beritaAcara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function edit(BeritaAcara $beritaAcara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BeritaAcara $beritaAcara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BeritaAcara  $beritaAcara
     * @return \Illuminate\Http\Response
     */
    public function destroy(BeritaAcara $beritaAcara)
    {
        //
    }
}
