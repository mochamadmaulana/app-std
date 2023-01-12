<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use DateTime;
use Illuminate\Database\Seeder;

class JabatanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                'nama_jabatan' => 'Administrator',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_jabatan' => 'Keuangan',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_jabatan' => 'Pembukuan',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_jabatan' => 'Sales',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_jabatan' => 'Manajer',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_jabatan' => 'Owner',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_jabatan' => 'User',
                'aktif' => 1,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        Jabatan::insert($jabatan);
    }
}
