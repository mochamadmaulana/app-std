<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_satuan',
        'quantity',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
}
