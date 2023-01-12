<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\BarangMasuk;
use App\Models\SatuanBarang;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang_masuk = BarangMasuk::with('supplier','satuan_barang','user')->get();
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
            "harga_beli" => ["required", "numeric"],
        ]);
        $satuan_barang = SatuanBarang::where('id',$request->satuan_barang_id)->first();
        if($satuan_barang){
            $total_berat = $request->quantity * $satuan_barang->quantity;
            BarangMasuk::create([
                'nama_barang' => $request->nama_barang,
                'supplier_id' => $request->supplier_id,
                'satuan_barang_id' => $request->satuan_barang_id,
                'quantity' => $request->quantity,
                'harga_beli' => $request->harga_beli,
                'harga_total' => $total_berat * $request->harga_beli,
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
        return redirect()->route('inventory.barang-masuk.index')->with("error", "Fitur edit barang masuk masih dalam tahap development!");
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
        return redirect()->route('inventory.barang-masuk.index')->with("error", "Fitur hapus barang masuk masih dalam tahap development!");
    }
}
