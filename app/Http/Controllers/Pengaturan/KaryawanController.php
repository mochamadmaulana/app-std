<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawan = User::with('jabatan')->orderBy('id', 'DESC')->get();
        return view('pengaturan.karyawan.index', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jabatan = Jabatan::all();
        return view('pengaturan.karyawan.create', compact('jabatan'));
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
            "jabatan_id" => ["required"],
            "hak_akses" => ["required"],
            "password" => ["required", "confirmed", "min:3"],
        ]);
        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'username' => strtolower($request->username),
            'email' => strtolower($request->email),
            'jabatan_id' => $request->jabatan_id,
            'password' => Hash::make($request->password),
            'hak_akses' => $request->hak_akses,
            'avatar' => 'default.jpg',
            'aktif' => 1
        ]);
        return redirect()->route('pengaturan.karyawan.index')->with("success", "Karyawan berhasil ditambahkan!");
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
        return redirect()->route('pengaturan.karyawan.index')->with("error", "Fitur edit karyawan belum dapat diakses!");
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
            $karyawan = User::where("id", $id)->delete();
            return redirect()->route('pengaturan.karyawan.index')->with("success", "Karyawan ".$karyawan->nama_lengkap." berhasil dihapus!");
        }else{
            return redirect()->route('pengaturan.karyawan.index')->with("error", "Karyawan tidak ditemukan!");
        }
    }
}
