<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $akses = Permission::orderBy('id','DESC')->get();
        return view('data-master.akses.index', compact('akses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.akses.create');
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
            "nama" => ["required", "max:30", "unique:roles,name"],
        ]);

        Permission::create([
            'name' => $request->nama,
            'guard_name' => 'web',
        ]);
        return redirect()->route('data-master.akses.index')->with("success", "Data role berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $akses = Permission::where("id", $id)->first();
        return view('data-master.akses.edit', compact('akses'));
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
            "nama" => ["required", "max:30"],
        ]);

        Permission::where('id',$id)->update([
            'name' => $request->nama,
        ]);
        return redirect()->route('data-master.akses.index')->with("success", "Data role berhasil diedit!");
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
            $akses = Permission::where("id", $id)->first();
            $akses->delete();
            return redirect()->route('data-master.akses.index')->with("success", "Data role ".$akses->name." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.akses.index')->with("error", "Data role tidak ditemukan!");
        }
    }
}
