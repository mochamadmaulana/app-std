<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\JabatanPegawai;
use Illuminate\Http\Request;

class JabatanPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan_pegawai = JabatanPegawai::orderBy("id", "DESC")->get();
        return view('data-master.jabatan-pegawai.index', compact('jabatan_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.jabatan-pegawai.create');
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
            "jabatan" => ["required", "max:150", "unique:jabatan_pegawais,nama"],
        ]);
        JabatanPegawai::create([
            'nama' => $request->jabatan,
            'aktif' => 1
        ]);
        return redirect()->route('data-master.jabatan-pegawai.index')->with("success", "Data jabatan pegawai berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan_pegawai = JabatanPegawai::where("id", $id)->first();
        return view('data-master.jabatan-pegawai.edit', compact('jabatan_pegawai'));
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
            "jabatan" => ["required", "max:150"],
        ]);
        JabatanPegawai::where("id", $id)->update([
            'nama' => $request->jabatan,
            'aktif' => $request->aktif
        ]);
        return redirect()->route('data-master.jabatan-pegawai.index')->with("success", "Data jabatan pegawai berhasil diedit!");
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
            $jabatan_pegawai = JabatanPegawai::where("id", $id)->first();
            $jabatan_pegawai->delete();
            return redirect()->route('data-master.jabatan-pegawai.index')->with("success", "Data jabatan pegawai ".$jabatan_pegawai->nama." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.jabatan-pegawai.index')->with("error", "Data jabatan pegawai tidak ditemukan!");
        }
    }
}
