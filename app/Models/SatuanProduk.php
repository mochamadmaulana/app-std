<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanProduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
}
