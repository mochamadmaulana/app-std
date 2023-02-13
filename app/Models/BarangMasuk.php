<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'supplier_id',
        'satuan_barang_id',
        'quantity',
        'harga_beli_perkilo',
        'harga_total',
        'user_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function satuan_barang()
    {
        return $this->belongsTo(SatuanBarang::class);
    }
}
