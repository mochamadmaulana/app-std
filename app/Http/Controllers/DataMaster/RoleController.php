<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::orderBy('id','DESC')->get();
        return view('data-master.role.index', compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('data-master.role.create');
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
            "role" => ["required", "max:30", "unique:roles,nama"],
        ]);

        Role::create([
            'nama' => $request->role,
            'aktif' => 1,
        ]);
        return redirect()->route('data-master.role.index')->with("success", "Data role berhasil ditambahkan!");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::where("id", $id)->first();
        return view('data-master.role.edit', compact('role'));
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
            "role" => ["required", "max:30"],
        ]);

        Role::where('id',$id)->update([
            'nama' => $request->role,
            'aktif' => $request->aktif,
        ]);
        return redirect()->route('data-master.role.index')->with("success", "Data role berhasil diedit!");
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
            $role = Role::where("id", $id)->first();
            $role->delete();
            return redirect()->route('data-master.role.index')->with("success", "Data role ".$role->nama." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.role.index')->with("error", "Data role tidak ditemukan!");
        }
    }
}
