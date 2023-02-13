<?php

namespace Database\Seeders;

use App\Models\Pemasok;
use Illuminate\Database\Seeder;

class PemasokTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pemasok = [
            [
                'nama' => null,
                'perusahaan' => 'UD. Mustika',
                'alamat' => 'JL. Raya Kudus KM. 5 Demak',
                'deskripsi' => '',
                'telepone' => '0291686411',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Owner Hj. Waidah',
                'perusahaan' => 'PB Langgeng  Murni',
                'alamat' => 'Jl. Siliwangi No 6 Indramayu',
                'deskripsi' => null,
                'telepone' => '082315732171',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Owner Agung Setyo Pamungkas S.E.,',
                'perusahaan' => 'PB Anugrah Agung',
                'alamat' => 'Jl. Made-Pondok (400 M Timur Pasar Made) Plumbon Sambung Macan Sragen',
                'deskripsi' => null,
                'telepone' => '085293222202',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        Pemasok::insert($pemasok);
    }
}
