<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::orderBy("id", "DESC")->get();
        return view('data-master.bank.index', compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.bank.create');
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
            "bank" => ["required", "max:10", "unique:banks,nama"],
            "deskripsi" => ["required", "unique:banks"],
        ]);

        Bank::create([
            'nama' => $request->bank,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('data-master.bank.index')->with("success", "Data bank berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::where("id", $id)->first();
        return view('data-master.bank.edit', compact('bank'));
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
            "bank" => ["required", "max:10"],
            "deskripsi" => ["required"],
        ]);
        Bank::where('id',$id)->update([
            'nama' => $request->bank,
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('data-master.bank.index')->with("success", "Data bank berhasil diedit!");
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
            $bank = Bank::where("id", $id)->first();
            $bank->delete();
            return redirect()->route('data-master.bank.index')->with("success", "Data bank ".$bank->nama." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.bank.index')->with("error", "Data bank tidak ditemukan!");
        }
    }
}
