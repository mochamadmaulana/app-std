<?php

namespace Database\Seeders;

use App\Models\SatuanProduk;
use Illuminate\Database\Seeder;

class SatuanProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan_produk = [
            [
                'nama' => 'Kg',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Pcs',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        SatuanProduk::insert($satuan_produk);
    }
}
