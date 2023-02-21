<?php

namespace App\Http\Controllers\DataMaster;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
            "nama" => ["required", "max:30", "unique:roles,name"],
        ]);

        Role::create([
            'name' => $request->nama,
            'guard_name' => 'web',
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
            "nama" => ["required", "max:30"],
        ]);

        Role::where('id',$id)->update([
            'name' => $request->nama,
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
            return redirect()->route('data-master.role.index')->with("success", "Data role ".$role->name." berhasil dihapus!");
        }else{
            return redirect()->route('data-master.role.index')->with("error", "Data role tidak ditemukan!");
        }
    }
}
