<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\SatuanProduk;
use Illuminate\Http\Request;

class SatuanProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan_produk = SatuanProduk::orderBy("id", "DESC")->get();
        return view('data-master.satuan-produk.index', compact('satuan_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.satuan-produk.create');
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
            "nama" => ["required", "max:50", "unique:satuan_produks"],
        ]);

        SatuanProduk::create([
            'nama' => $request->nama,
        ]);
        return redirect()->route('data-master.satuan-produk.index')->with("success", "Data satuan produk berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $satuan_produk = SatuanProduk::where("id", $id)->first();
        return view('data-master.satuan-produk.edit', compact('satuan_produk'));
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
            "nama" => ["required", "max:50", "unique:satuan_produks"],
        ]);

        SatuanProduk::where('id',$id)->update([
            'nama' => $request->nama,
        ]);
        return redirect()->route('data-master.satuan-produk.index')->with("success", "Data satuan produk berhasil diedit!");
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
            $satuan_produk = SatuanProduk::where("id", $id)->first();
            $satuan_produk->delete();
            return redirect()->route('data-master.satuan-produk.index')->with("success", "Data satuan produk ".$satuan_produk->nama." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.satuan-produk.index')->with("error", "Data satuan produk tidak ditemukan!");
        }
    }
}
