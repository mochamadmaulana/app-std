<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukPemasok extends Model
{
    use HasFactory;
    protected $fillable = [
        'pemasok_id',
        'produk_id'
    ];

    public function pemasok()
    {
        return $this->belongsTo(Pemasok::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
