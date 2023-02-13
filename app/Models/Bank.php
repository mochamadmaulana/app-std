<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'deskripsi'
    ];

    public function rekening_bank()
    {
        return $this->hasMany(RekeningBank::class);
    }
}
