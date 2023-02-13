<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'kode',
        'kategori_produk_id',
        'pemasok_id',
    ];

    public function produk_pemasok()
    {
        return $this->hasMany(ProdukPemasok::class);
    }

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class);
    }
}
