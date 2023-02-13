<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekeningBank extends Model
{
    use HasFactory;
    protected $fillable = [
        'pemilik',
        'nomor',
        'bank_id',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
