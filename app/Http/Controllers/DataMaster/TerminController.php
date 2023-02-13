<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Termin;
use Illuminate\Http\Request;

class TerminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termin = Termin::orderBy("id", "DESC")->get();
        return view('data-master.termin.index', compact('termin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.termin.create');
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
            "termin" => ["required", "max:15", "unique:termins,nama"],
            "lama_hari" => ["required", "unique:termins"],
        ]);

        Termin::create([
            'nama' => $request->termin,
            'lama_hari' => $request->lama_hari,
        ]);
        return redirect()->route('data-master.termin.index')->with("success", "Data termin berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $termin = Termin::where("id", $id)->first();
        return view('data-master.termin.edit', compact('termin'));
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
            "termin" => ["required", "max:15"],
            "lama_hari" => ["required"],
        ]);

        Termin::where('id',$id)->update([
            'nama' => $request->termin,
            'lama_hari' => $request->lama_hari,
        ]);
        return redirect()->route('data-master.termin.index')->with("success", "Data termin berhasil diedit!");
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
            $termin = Termin::where("id", $id)->first();
            $termin->delete();
            return redirect()->route('data-master.termin.index')->with("success", "Data termin ".$termin->nama." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.termin.index')->with("error", "Data termin tidak ditemukan!");
        }
    }
}
