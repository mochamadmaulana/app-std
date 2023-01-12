<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = Supplier::orderBy('id', 'DESC')->get();
        return view('inventory.supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('inventory.supplier.create');
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
            "nama_supplier" => ["required", "max:200"],
        ]);
        Supplier::create([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'desc_supplier' => $request->desc_supplier,
            'telephone_supplier' => $request->telephone_supplier,
            'aktif' => 1,
        ]);
        return redirect()->route('inventory.supplier.index')->with("success", "Supplier berhasil ditambahkan!");
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
        $supplier = Supplier::where("id", $id)->first();
        return view('inventory.supplier.edit', compact('supplier'));
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
            "nama_supplier" => ["required", "max:200"],
        ]);
        Supplier::where('id', $id)->update([
            'nama_supplier' => $request->nama_supplier,
            'alamat_supplier' => $request->alamat_supplier,
            'desc_supplier' => $request->desc_supplier,
            'telephone_supplier' => $request->telephone_supplier,
            'aktif' => $request->aktif,
        ]);
        return redirect()->route('inventory.supplier.index')->with("success", "Supplier berhasil diedit!");
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
            $supplier = Supplier::where("id", $id)->first();
            $supplier->delete();
            return redirect()->route('inventory.supplier.index')->with("success", "Supplier ".$supplier->nama_supplier." berhasil dihapus!");
        }else{
            return redirect()->route('inventory.supplier.index')->with("error", "Supplier tidak ditemukan!");
        }
    }
}
