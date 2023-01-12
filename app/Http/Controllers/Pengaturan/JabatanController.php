<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jabatan = Jabatan::orderBy("id", "DESC")->get();
        return view('pengaturan.jabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengaturan.jabatan.create');
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
            "nama_jabatan" => ["required", "max:150"],
        ]);
        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
            'aktif' => 1
        ]);
        return redirect()->route('pengaturan.jabatan.index')->with("success", "Jabatan berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jabatan = Jabatan::where("id", $id)->first();
        return view('pengaturan.jabatan.edit', compact('jabatan'));
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
            "nama_jabatan" => ["required", "max:150"],
        ]);
        Jabatan::where("id", $id)->update([
            'nama_jabatan' => $request->nama_jabatan,
            'aktif' => $request->aktif
        ]);
        return redirect()->route('pengaturan.jabatan.index')->with("success", "Jabatan berhasil diedit!");
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
            $jabatan = Jabatan::where("id", $id)->first();
            $jabatan->delete();
            return redirect()->route('pengaturan.jabatan.index')->with("success", "Jabatan ".$jabatan->nama_jabatan." berhasil dihapus!");
        }else{
            return redirect()->route('pengaturan.jabatan.index')->with("error", "Jabatan tidak ditemukan!");
        }
    }
}
