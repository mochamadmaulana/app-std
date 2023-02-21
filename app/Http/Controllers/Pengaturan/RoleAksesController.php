<?php

namespace App\Http\Controllers\Pengaturan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAksesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::orderBy('id', 'DESC')->get();
        $akses = Permission::orderBy('id', 'DESC')->get();
        $role_akses = Role::orderBy('id','DESC')->get();
        return view('pengaturan.role-akses.index', compact('role_akses','akses','role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::orderBy('id', 'DESC')->get();
        $akses = Permission::orderBy('id', 'DESC')->get();
        return view('pengaturan.role-akses.create', compact('akses','role'));
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
            "role" => ["required"],
            "akses" => ["required", 'unique:role_has_permissions,permission_id'],
        ]);
        $role = Role::findById($request->role);
        $role->givePermissionTo($request->akses);
        return redirect()->route('pengaturan.role-akses.index')->with("success", "Data role akses berhasil ditambahkan!");
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

        return redirect()->route('pengaturan.role-akses.index')->with("error", "Fitur belum tersedia!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return redirect()->route('pengaturan.role-akses.index')->with("error", "Fitur belum tersedia!");
        // if ($id) {
        //     $pemasok = pemasok::where("id", $id)->first();
        //     $pemasok->delete();
        //     return redirect()->route('pengaturan.akses-jabatan-pegawai.index')->with("success", "pemasok berhasil dihapus!");
        // }else{
        //     return redirect()->route('pengaturan.akses-jabatan-pegawai.index')->with("error", "pemasok tidak ditemukan!");
        // }
    }
}
