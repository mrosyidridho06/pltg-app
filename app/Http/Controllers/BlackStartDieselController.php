<?php

namespace App\Http\Controllers;

use App\Models\BSDdetail;
use Illuminate\Support\Str;
use App\Models\BSDIsiDetail;
use Illuminate\Http\Request;
use App\Models\JenisLogsheet;
use App\Models\BlackStartDiesel;
use Illuminate\Support\Arr;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;
use Carbon\Carbon;

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
        $alat = BlackStartDiesel::get();

        return view('management_document.bsd.create', compact('alat '));
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
            'nama_alat' => ['required', 'string'],
            'penunjukan_meter' => ['required', 'string'],
        ]);

        BlackStartDiesel::create([
            'nama_alat' => $request->nama_alat,
            'penunjukan_meter' => $request->penunjukan_meter,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
        // try {
        // } catch(\Exception $e){
        //     Alert::toast('Nama alat sudah ada', 'error');
        //     return redirect()->back();
        // }

    }

    public function storeDetail(Request $request)
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

    public function storeIsi(Request $request){


        $request->validate([
            'siap_operasi.*' => 'required',
            'gangguan.*' => 'required',
            'keterangan.*' => 'nullable',
            'bsd_id' => 'required',
            'isi_id' => 'required',
        ]);

        $arr = $request->all();

        $data = $arr['bsd_id'];
        $siap = $arr['siap_operasi'];
        $gang = $arr['gangguan'];
        $ket = $arr['keterangan'];
        $isi = $arr['isi_id'];

        $finalArray = array();
        // dd($arr);
        foreach($data as $key=>$item){
            array_push($finalArray, array(
                'siap_operasi'=> $siap[$key],
                'gangguan'=> $gang[$key],
                'keterangan' => $ket[$key],
                'bsd_details_id' => $isi[$key],
                'black_start_diesels_id' => $data[$key],
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
                )
            );
        }
        // dd($finalArray);

        BSDIsiDetail::insert($finalArray);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
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
        $based = BlackStartDiesel::get();

        return view('management_document.bsd.show', compact('bsd', 'based'));
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
