<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\JabatanUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = User::orderBy('id', 'DESC')->get();
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::orderBy('id','DESC')->get();
        return view('pegawai.create',compact('role'));
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
            "nama_lengkap" => ["required", "max:200"],
            "username" => ["required", "max:25", "min:4", "unique:users"],
            "email" => ["required", "unique:users"],
            "jabatan_pegawai" => ["required"],
            "hak_akses" => ["required"],
            "password" => ["required", "confirmed", "min:3"],
        ]);
        User::create([
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'password' => Hash::make($request->password),
            'hak_akses' => $request->hak_akses,
            'avatar' => 'default.jpg',
            'aktif' => 1
        ]);
        return redirect()->route('pegawai.index')->with("success", "Pegawai berhasil ditambahkan!");
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
        return redirect()->route('pegawai.index')->with("error", "Fitur edit user belum dapat diakses!");
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
        if ($id) {
            User::where("id", $id)->delete();
            return redirect()->route('pegawai.index')->with("success", "Pegawai berhasil dihapus!");
        }else{
            return redirect()->route('pegawai.index')->with("error", "Pegawai tidak ditemukan!");
        }
    }
}
