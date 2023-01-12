<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\SatuanBarang;
use Illuminate\Http\Request;

class SatuanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan_barang = SatuanBarang::orderBy("id", "DESC")->get();
        return view('inventory.satuan-barang.index', compact('satuan_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.satuan-barang.create');
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
            "nama_satuan" => ["required", "max:150"],
            "quantity" => ["required", "numeric"],
        ]);
        SatuanBarang::create([
            'nama_satuan' => $request->nama_satuan,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('inventory.satuan-barang.index')->with("success", "Satuan Barang berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $satuan_barang = SatuanBarang::where("id", $id)->first();
        return view('inventory.satuan-barang.edit', compact('satuan_barang'));
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
            "nama_satuan" => ["required", "max:150"],
            "quantity" => ["required", "numeric"],
        ]);
        SatuanBarang::where('id',$id)->update([
            'nama_satuan' => $request->nama_satuan,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('inventory.satuan-barang.index')->with("success", "Satuan Barang berhasil diedit!");
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
            $satuan_barang = SatuanBarang::where("id", $id)->first();
            $satuan_barang->delete();
            return redirect()->route('inventory.satuan-barang.index')->with("success", "Satuan Barang ".$satuan_barang->nama_satuan." berhasil dihapus!");
        }else{
            return redirect()->route('inventory.satuan-barang.index')->with("error", "Satuan Barang tidak ditemukan!");
        }
    }
}
