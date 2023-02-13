<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori_produk = KategoriProduk::orderBy("id", "DESC")->get();
        return view('data-master.kategori-produk.index', compact('kategori_produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.kategori-produk.create');
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
            "nama" => ["required", "max:50", "unique:kategori_produks"],
        ]);

        KategoriProduk::create([
            'nama' => $request->nama,
        ]);
        return redirect()->route('data-master.kategori-produk.index')->with("success", "Data kategori produk berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kategori_produk = KategoriProduk::where("id", $id)->first();
        return view('data-master.kategori-produk.edit', compact('kategori_produk'));
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
            "nama" => ["required", "max:50", "unique:kategori_produks"],
        ]);

        KategoriProduk::where('id',$id)->update([
            'nama' => $request->nama,
        ]);
        return redirect()->route('data-master.kategori-produk.index')->with("success", "Data kategori produk berhasil diedit!");
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
            $kategori_produk = KategoriProduk::where("id", $id)->first();
            $kategori_produk->delete();
            return redirect()->route('data-master.kategori-produk.index')->with("success", "Data kategori produk ".$kategori_produk->nama." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.kategori-produk.index')->with("error", "Data kategori produk tidak ditemukan!");
        }
    }
}
