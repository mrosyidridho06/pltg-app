<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Shift;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::all();

        $title = 'Delete Shift!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('master.shift.index', compact('shifts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
            'nama_shift' => 'required',
            'shift_awal' => 'required',
            'shift_akhir' => 'required'
        ]);

        Shift::create([
            'nama_shift' => $request->nama_shift,
            'shift_awal' => $request->shift_awal,
            'shift_akhir' => $request->shift_akhir,
        ]);

        Alert::toast('Data Berhasil Ditambah', 'success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('master.shift.edit', compact('shift'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
         //define validation rules
         $validator = Validator::make($request->all(), [
            'nama_shift'     => 'required',
            'shift_awal'   => 'required',
            'shift_akhir'   => 'required',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $shift->update([
            'nama_shift'     => $request->nama_shift,
            'shift_awal'   => $request->shift_awal,
            'shift_akhir'   => $request->shift_akhir,
        ]);

        // //return response
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data Berhasil Diudapte!',
        //     'data'    => $shift
        // ]);

        Alert::toast('Data Berhasil Diupdate', 'success');
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        try {
            $shift->delete();
            alert()->success('Success','Your file has been deleted.');
            return redirect()->back();
        }catch (Exception $e){
            alert()->error('Error','Data terpakai di laporan');
            return redirect()->back();
        }

    }
}
