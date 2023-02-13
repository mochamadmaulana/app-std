<?php

namespace Database\Seeders;

use App\Models\KategoriProduk;
use Illuminate\Database\Seeder;

class KategoriProdukTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kategori_produk = [
            [
                'nama' => 'Beras',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Minyak',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        KategoriProduk::insert($kategori_produk);
    }
}
