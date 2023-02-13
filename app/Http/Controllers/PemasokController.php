<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemasok = Pemasok::orderBy('id', 'DESC')->get();
        return view('pemasok.index', compact('pemasok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pemasok.create');
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
            "perusahaan" => ["required", "max:200"],
            "telepone" => ["required","numeric"],
        ]);
        pemasok::create([
            'nama' => $request->nama,
            'perusahaan' => $request->perusahaan,
            'telepone' => $request->telepone,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'aktif' => 1,
        ]);
        return redirect()->route('pemasok.index')->with("success", "Data pemasok berhasil ditambahkan!");
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
        $pemasok = pemasok::where("id", $id)->first();
        return view('pemasok.edit', compact('pemasok'));
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
            "perusahaan" => ["required", "max:200"],
            "telepone" => ["required","numeric"],
        ]);
        pemasok::where('id', $id)->update([
            'nama' => $request->nama,
            'perusahaan' => $request->perusahaan,
            'telepone' => $request->telepone,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('pemasok.index')->with("success", "Data pemasok berhasil diedit!");
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
            $pemasok = pemasok::where("id", $id)->first();
            $pemasok->delete();
            return redirect()->route('pemasok.index')->with("success", "pemasok ".$pemasok->nama_pemasok." berhasil dihapus!");
        }else{
            return redirect()->route('pemasok.index')->with("error", "pemasok tidak ditemukan!");
        }
    }
}
