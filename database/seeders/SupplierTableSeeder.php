<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = [
            [
                'nama_supplier' => 'UD. Mustika',
                'alamat_supplier' => 'JL. Raya Kudus KM. 5 Demak',
                'desc_supplier' => '',
                'telephone_supplier' => '0291686411',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_supplier' => 'PB Langgeng  Murni',
                'alamat_supplier' => 'Jl. Siliwangi No 6 Indramayu',
                'desc_supplier' => 'Owner Hj. Waidah',
                'telephone_supplier' => '082315732171',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_supplier' => 'PB Anugrah Agung',
                'alamat_supplier' => 'Jl. Made-Pondok (400 M Timur Pasar Made) Plumbon Sambung Macan Sragen',
                'desc_supplier' => 'Owner Agung Setyo Pamungkas S.E.,',
                'telephone_supplier' => '085293222202, 085293222220',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        Supplier::insert($supplier);
    }
}
