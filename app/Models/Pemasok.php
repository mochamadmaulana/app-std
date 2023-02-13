<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'perusahaan',
        'alamat',
        'deskripsi',
        'telepone',
        'aktif',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }

    public function pemasok_produk()
    {
        return $this->hasMany(PemasokProduk::class);
    }

    public function telepone_pemasok()
    {
        return $this->hasMany(TeleponePemasok::class);
    }
}
