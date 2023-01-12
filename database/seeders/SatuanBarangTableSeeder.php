<?php

namespace Database\Seeders;

use App\Models\SatuanBarang;
use Illuminate\Database\Seeder;

class SatuanBarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan_barang = [
                [
                    'nama_satuan' => 'Karung Kg',
                    'quantity' => 50,
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime
                ],
                [
                    'nama_satuan' => 'Karung Kg',
                    'quantity' => 20,
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime
                ],
                [
                    'nama_satuan' => 'Karung Kg',
                    'quantity' => 10,
                    'created_at' => new \DateTime,
                    'updated_at' => new \DateTime
                ],
            ];
        SatuanBarang::insert($satuan_barang);
    }
}
