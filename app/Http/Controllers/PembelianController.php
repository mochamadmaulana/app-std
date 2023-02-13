<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pemasok;
use App\Models\Pembelian;
use App\Models\Produk;
use App\Models\SatuanProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelian = Pembelian::with('pemasok','satuan_produk','user')->orderBy('id','DESC')->get();
        return view('pembelian.index', compact('pembelian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = Produk::with('supplier', 'user')->orderBy('id','DESC')->get();
        $satuan_produk = SatuanProduk::orderBy('id','DESC')->get();
        return view('pembelian.create', compact('produk','satuan_produk'));
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
            "nama_barang" => ["required", "max:200"],
            "supplier_id" => ["required"],
            "master_satuan_barang_id" => ["required"],
            "quantity" => ["required", "numeric"],
            "harga_beli_perkilo" => ["required", "numeric"],
        ]);
        $satuan_produk = SatuanProduk::where('id',$request->satuan_barang_id)->first();
        if($satuan_produk){
            $total_berat = $request->quantity * $satuan_produk->quantity;
            Pembelian::create([
                'nama_barang' => $request->nama_barang,
                'supplier_id' => $request->supplier_id,
                'satuan_barang_id' => $request->satuan_barang_id,
                'quantity' => $request->quantity,
                'harga_beli_perkilo' => $request->harga_beli_perkilo,
                'harga_total' => $total_berat * $request->harga_beli_perkilo,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('pembelian.index')->with("success", "Barang Masuk berhasil ditambahkan!");
        }
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
        $pembelian = Pembelian::with('supplier','master_satuan_barang')->where('id', $id)->first();
        $pemasok = Pemasok::orderBy('id', 'DESC')->get();
        $satuan_produk = SatuanProduk::orderBy('id', 'DESC')->get();
        return view('pembelian.edit', compact('pembelian','pemasok','satuan_produk'));
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
            "nama_barang" => ["required", "max:200"],
            "supplier_id" => ["required"],
            "master_satuan_barang_id" => ["required"],
            "quantity" => ["required", "numeric"],
            "harga_beli_perkilo" => ["required", "numeric"],
        ]);
        $satuan_produk = SatuanProduk::where('id',$request->satuan_barang_id)->first();
        if($satuan_produk){
            $total_berat = $request->quantity * $satuan_produk->quantity;
            Pembelian::where('id',$id)->update([
                'nama_barang' => $request->nama_barang,
                'supplier_id' => $request->supplier_id,
                'satuan_barang_id' => $request->satuan_barang_id,
                'quantity' => $request->quantity,
                'harga_beli_perkilo' => $request->harga_beli_perkilo,
                'harga_total' => $total_berat * $request->harga_beli_perkilo,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('pembelian.index')->with("success", "Barang Masuk berhasil diedit!");
        }
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
            $pembelian = Pembelian::where("id", $id)->first();
            $pembelian->delete();
            return redirect()->route('pembelian.index')->with("success", "Barang Masuk ".$pembelian->nama_barang." berhasil dihapus!");
        }else{
            return redirect()->route('pembelian.index')->with("error", "Barang Masuk tidak ditemukan!");
        }
    }
}
