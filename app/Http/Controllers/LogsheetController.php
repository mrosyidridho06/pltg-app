<?php

namespace App\Http\Controllers;

use App\Models\DetailParameterLogsheet;
use App\Models\Logsheet;
use Illuminate\Http\Request;
use App\Models\JenisLogsheet;
use App\Models\ParameterLogsheet;
use Egulias\EmailValidator\Result\Reason\DetailedReason;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Html\Editor\Fields\Select;

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
        $jl = JenisLogsheet::get();

        return view('laporan.logsheet.index', compact('logsheets', 'jl'));
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
            'nomor_dokumen' => 'required',
            'tanggal_terbit' => 'required',
            'jenis_logsheet_id' => 'required',
        ]);

        Logsheet::create([
            'nomor_dokumen' => $request->nomor_dokumen,
            'tanggal_terbit' => $request->tanggal_terbit,
            'jenis_logsheet_id' => $request->jenis_logsheet_id,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logsheet  $logsheet
     * @return \Illuminate\Http\Response
     */
    public function show(Logsheet $logsheet)
    {

        $logsheet = Logsheet::with('jenislogsheet')->get();

        foreach($logsheet as $item){
            $idjnislog = $item->jenis_logsheet_id;
        }

        $parameter = ParameterLogsheet::with('jenislogsheet', 'detailparameter')->where('jenis_logsheet_id', $idjnislog)->get();


        // dd($parameter);

        foreach($parameter as $item){
            $idparam[] = $item->id;
            foreach($item->detailparameter as $dl){
                $iddetail[] = $dl->parameter_logsheet_id;
                $jl[] = $dl->detail_parameter;
            }
        }

        // dd($iddetail);

        // $iddp = array_splice($iddetail, 1,2,3,4,5,6,7);
        // dd($iddp);

        // $jumlah = DetailParameterLogsheet::withCount('parameter')->get();
        // dd($jumlah);

        // $iddp = array_values($idparam);
        // // dd($iddp);

        // $jumlahparameter = DetailParameterLogsheet::with('parameter')->get();

        // dd($jumlahparameter);


        return view('laporan.logsheet.show', compact('logsheet', 'parameter'));
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
