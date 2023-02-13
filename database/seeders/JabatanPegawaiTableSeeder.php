<?php

namespace Database\Seeders;

use App\Models\JabatanPegawai;
use Illuminate\Database\Seeder;

class JabatanPegawaiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan_pegawai = [
            [
                'nama' => 'Administrator',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Bendahara',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Pembukuan',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Sales',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Manajer',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Owner',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'User',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        JabatanPegawai::insert($jabatan_pegawai);
    }
}
