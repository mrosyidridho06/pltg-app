<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PenyulangPembangkit;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\PenyulangPembangkitDetail;
use App\Models\PenyulangPembangkitIsiDetail;

class PenyulangPembangkitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyulang = PenyulangPembangkitDetail::get();

        return view('management_document.data_penyulangpembangkit.index', compact('penyulang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $penyulang = PenyulangPembangkit::get();
        return view('management_document.data_penyulangpembangkit.create', compact('penyulang'));
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
            'parameter' => ['required', 'string'],
            'satuan' => ['required', 'string'],
        ]);

        PenyulangPembangkit::create([
            'parameter' => $request->parameter,
            'satuan' => $request->satuan,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    public function storeDetail(Request $request)
    {
        $request->validate([
            'tanggal_terbit' => 'required',
            'nomor_dokumen' => ['required', 'string'],
        ]);

        try {
            PenyulangPembangkitDetail::create([
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

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    public function storeIsiDetail(Request $request)
    {
        $request->validate([
            'jam_22*' => 'required',
            'jam_23*' => 'required',
            'jam_00*' => 'required',
            'jam_01*' => 'required',
            'jam_02*' => 'required',
            'jam_03*' => 'required',
            'jam_04*' => 'required',
            'jam_05*' => 'required',
            'jam_06*' => 'required',
            'jam_07*' => 'required',
            'jam_08*' => 'required',
            'jam_09*' => 'required',
            'jam_10*' => 'required',

        ]);

        $arr = $request->all();

        $data = $arr['checklist_id'];
        $isi = $arr['detail_id'];
        $jam22 = $arr['jam_22'];
        $jam23 = $arr['jam_23'];
        $jam00 = $arr['jam_00'];
        $jam01 = $arr['jam_01'];
        $jam02 = $arr['jam_02'];
        $jam03 = $arr['jam_03'];
        $jam04 = $arr['jam_04'];
        $jam05 = $arr['jam_05'];
        $jam06 = $arr['jam_06'];
        $jam07 = $arr['jam_07'];
        $jam08 = $arr['jam_08'];
        $jam09 = $arr['jam_09'];
        $jam10 = $arr['jam_10'];


        $finalArray = array();
        // dd($arr);
        foreach($data as $key=>$item){
            array_push($finalArray, array(
                'jam_22'=> $jam22[$key],
                'jam_23'=> $jam23[$key],
                'jam_00'=> $jam00[$key],
                'jam_01'=> $jam01[$key],
                'jam_02'=> $jam02[$key],
                'jam_03'=> $jam03[$key],
                'jam_04'=> $jam04[$key],
                'jam_05'=> $jam05[$key],
                'jam_06'=> $jam06[$key],
                'jam_07'=> $jam07[$key],
                'jam_08'=> $jam08[$key],
                'jam_09'=> $jam09[$key],
                'jam_10'=> $jam10[$key],
                'detail_id' => $isi[$key],
                'checklist_id' => $data[$key],
                "created_at"=> Carbon::now(),
                "updated_at"=> Carbon::now()
                )
            );
        }
        // dd($finalArray);

        PenyulangPembangkitIsiDetail::insert($finalArray);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->route('firepump.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PenyulangPembangkit  $penyulangPembangkit
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $penyulang = PenyulangPembangkit::orderBy('nomor', 'asc')->get();
        $penyulangdetail = PenyulangPembangkitDetail::where('nomor_dokumen', $slug)->first();
        $isidetail = PenyulangPembangkitIsiDetail::where('detail_id', $penyulangdetail->id)->with('checklist', 'detail')->get();
        // dd($start);

        return view('laporan.checklist_firepump.show', compact('fire', 'firedetail', 'isidetail'));
    }

    public function isi($slug)
    {
        $penyulang = PenyulangPembangkit::orderBy('id', 'asc')->get();
        $penyulangdetail = PenyulangPembangkitDetail::where('nomor_dokumen', $slug)->first();

        return view('management_document.data_penyulangpembangkit.isi', compact('penyulang', 'penyulangdetail'));
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
