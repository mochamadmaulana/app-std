<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use App\Models\RekeningBank;
use Illuminate\Http\Request;

class RekeningBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rekening_bank = RekeningBank::with('bank')->orderBy("id", "DESC")->get();
        return view('rekening-bank.index', compact('rekening_bank'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bank = Bank::orderBy('id','DESC')->get();
        return view('rekening-bank.create', compact('bank'));
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
            "pemilik" => ["required"],
            "nomor_rekening" => ["required", "max:25", "unique:rekening_banks,nomor"],
            "bank" => ["required"],
        ]);

        RekeningBank::create([
            'pemilik' => $request->pemilik,
            'nomor' => $request->nomor_rekening,
            'bank_id' => $request->bank,
        ]);
        return redirect()->route('rekening-bank.index')->with("success", "Data rekening bank berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rekening_bank = RekeningBank::where("id", $id)->first();
        $bank = Bank::orderBy('id','DESC')->get();
        return view('rekening-bank.edit', compact('rekening_bank','bank'));
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
            "nama" => ["required", "max:50", "unique:rekenings"],
        ]);

        RekeningBank::where('id',$id)->update([
            'nama' => $request->nama,
        ]);
        return redirect()->route('rekening-bank.index')->with("success", "Data rekening bank berhasil diedit!");
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
            $bank = RekeningBank::where("id", $id)->first();
            $bank->delete();
            return redirect()->route('rekening-bank.index')->with("success", "Data rekening bank ".$bank->nama." berhasil dihapus!");
        }else{
            return redirect()->route('rekening-bank.index')->with("error", "Data rekening bank tidak ditemukan!");
        }
    }
}
