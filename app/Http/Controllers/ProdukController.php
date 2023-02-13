<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Pemasok;
use App\Models\Produk;
use App\Models\ProdukPemasok;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = Produk::with('pemasok','kategori_produk')->orderBy("id", "DESC")->get();
        return view('produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriProduk::orderBy('id', 'DESC')->get();
        $pemasok = Pemasok::orderBy('id', 'DESC')->get();

        $last_produk = Produk::orderBy('kode','DESC')->first() ;
        $kode_terakhir = $last_produk != null ? $last_produk->kode : 'PRD-0';
        $increment = intval(substr($kode_terakhir, 4))+1;
        $kode = 'PRD-'.str_repeat(0,(4-strlen($increment))).$increment;
        return view('produk.create', compact('kategori','kode', 'pemasok'));
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
            "nama" => ["required"],
            "kategori" => ["required"],
            "pemasok" => ["required"],
        ]);
        $config = [
            'table' => 'produks',
            'field'=>'kode',
            'length' => 8,
            'prefix' => 'PRD-'
        ];
        $kode = IdGenerator::generate($config);
        try {
            DB::beginTransaction();
                $produk = Produk::create([
                    'kode' => $kode,
                    'nama' => $request->nama,
                    'kategori_produk_id' => $request->kategori,
                    'pemasok_id' => $request->pemasok,
                ]);

                ProdukPemasok::create([
                    'pemasok_id' => $produk->pemasok_id,
                    'produk_id' => $produk->id,
                ]);
            DB::commit();
            return redirect()->route('produk.index')->with("success", "Data produk berhasil ditambahkan!");
        }catch(\Throwable $th) {
            DB::rollBack();
            return redirect()->route('produk.index')->with("error", "Data produk gagal ditambahkan!");
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
        $produk = Produk::with('pemasok','kategori_produk')->whereId($id)->first();
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::whereId($id)->first();
        $kategori = KategoriProduk::orderBy('id','DESC')->get();
        $pemasok = Pemasok::orderBy('id','DESC')->get();
        return view('produk.edit', compact('produk','kategori','pemasok'));
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
            "nama" => ["required"],
            "kategori" => ["required"],
            "pemasok" => ["required"],
        ]);
        $produk = Produk::with('produk_pemasok')->whereId($id)->first();
        try {
            DB::beginTransaction();
                Produk::whereId($id)->update([
                    'nama' => $request->nama,
                    'kategori_produk_id' => $request->kategori,
                    'pemasok_id' => $request->pemasok,
                ]);
                if($produk->pemasok_id != $request->pemasok){
                    ProdukPemasok::whereId($produk->pemasok_id)->update([
                        'pemasok_id' => $request->pemasok,
                    ]);
                }
            DB::commit();
            return redirect()->route('produk.index')->with("success", "Data produk berhasil diedit!");
        }catch(\Throwable $th) {
            DB::rollBack();
            return redirect()->route('produk.index')->with("error", "Data produk gagal diedit!");
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
            $produk = Produk::whereId($id)->first();
            $produk_pemasok = ProdukPemasok::where('produk_id',$produk->id)->first();
            $produk_pemasok->delete();
            $produk->delete();
            return back()->with("success", "Data produk berhasil dihapus!");
        }else{
            return back()->with("error", "Data produk gagal dihapus!");
        }
    }
}
