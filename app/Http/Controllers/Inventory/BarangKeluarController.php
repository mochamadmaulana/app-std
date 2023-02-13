<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\BarangKeluar;
use App\Models\SatuanBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = BarangKeluar::with('supplier','satuan_barang','user')->get();
        return view('inventory.barang-masuk.index', compact('barang_masuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::orderBy('id','DESC')->get();
        $satuan_barang = SatuanBarang::orderBy('id','DESC')->get();
        return view('inventory.barang-masuk.create', compact('supplier','satuan_barang'));
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
            "satuan_barang_id" => ["required"],
            "quantity" => ["required", "numeric"],
            "harga_beli_perkilo" => ["required", "numeric"],
        ]);
        $satuan_barang = SatuanBarang::where('id',$request->satuan_barang_id)->first();
        if($satuan_barang){
            $total_berat = $request->quantity * $satuan_barang->quantity;
            BarangKeluar::create([
                'nama_barang' => $request->nama_barang,
                'supplier_id' => $request->supplier_id,
                'satuan_barang_id' => $request->satuan_barang_id,
                'quantity' => $request->quantity,
                'harga_beli_perkilo' => $request->harga_beli_perkilo,
                'harga_total' => $total_berat * $request->harga_beli_perkilo,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('inventory.barang-masuk.index')->with("success", "Barang Masuk berhasil ditambahkan!");
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
        $barang_masuk = BarangKeluar::with('supplier','satuan_barang')->where('id', $id)->first();
        $supplier = Supplier::orderBy('id', 'DESC')->get();
        $satuan_barang = SatuanBarang::orderBy('id', 'DESC')->get();
        return view('inventory.barang-masuk.edit', compact('barang_masuk','supplier','satuan_barang'));
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
            "satuan_barang_id" => ["required"],
            "quantity" => ["required", "numeric"],
            "harga_beli_perkilo" => ["required", "numeric"],
        ]);
        $satuan_barang = SatuanBarang::where('id',$request->satuan_barang_id)->first();
        if($satuan_barang){
            $total_berat = $request->quantity * $satuan_barang->quantity;
            BarangKeluar::where('id',$id)->update([
                'nama_barang' => $request->nama_barang,
                'supplier_id' => $request->supplier_id,
                'satuan_barang_id' => $request->satuan_barang_id,
                'quantity' => $request->quantity,
                'harga_beli_perkilo' => $request->harga_beli_perkilo,
                'harga_total' => $total_berat * $request->harga_beli_perkilo,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->route('inventory.barang-masuk.index')->with("success", "Barang Masuk berhasil diedit!");
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
            $barang_masuk = BarangKeluar::where("id", $id)->first();
            $barang_masuk->delete();
            return redirect()->route('inventory.barang-masuk.index')->with("success", "Barang Masuk ".$barang_masuk->nama_barang." berhasil dihapus!");
        }else{
            return redirect()->route('inventory.barang-masuk.index')->with("error", "Barang Masuk tidak ditemukan!");
        }
    }
}
