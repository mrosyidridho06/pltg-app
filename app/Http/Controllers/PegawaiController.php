<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Role;
use App\DataTables\PegawaiDataDataTable;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role as ModelsRole;

class PegawaiController extends Controller
{
    public function __construct() {
        $this->middleware('can: create users, read users')->only('create, read');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PegawaiDataDataTable $dataTable)
    {
        $this->authorize('read users');

        $users = User::with('roles')->get();
        $rolesregis = ModelsRole::all();

        // return $dataTable->render('pegawai.index', compact('rolesregis'));
        return view('pegawai.index', compact('users', 'rolesregis'));
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','string', 'min:8', 'confirmed'],
            'role' => 'required'
        ]);

        // dd($request->all());

        $userc = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $userc->assignrole($request->role);

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
        $roles = ModelsRole::all();
        $permissions = Permission::all();

        return view('pegawai.show', compact('roles', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $role = ModelsRole::all();
        return view('pegawai.edit', compact('user', 'role'));
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
        $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'current_password' => 'required_with:new_password',
            'new_password' => [Password::defaults()->min(8)->numbers()->mixedCase(), 'required_with:current_password'],
            'password_confirmation' => 'required_with:new_password|same:new_password',
            // 'password' => ['required','string', 'min:8', 'confirmed'],
            'role' => 'required'
        ]);

        $userc = User::find($id);
        $userc->name = $request->name;
        $userc->email = $request->email;
        if (!is_null($request->input('current_password'))) {
            if (Hash::check($request->input('current_password'), $userc->password)) {
                $userc->password = Hash::make($request->input('new_password'));
            } else {
                Alert::toast('Password Lama Tidak Sesuai!', 'error');
            }
        }
        $userc->assignrole($request->role);
        $userc->save();

        Alert::toast('Data Berhasil Diupdate', 'success');
        return redirect()->back();
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
