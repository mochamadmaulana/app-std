<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_supplier',
        'alamat_supplier',
        'desc_supplier',
        'telephone_supplier',
        'aktif',
    ];

    public function barang_masuk()
    {
        return $this->hasMany(BarangMasuk::class);
    }
}
