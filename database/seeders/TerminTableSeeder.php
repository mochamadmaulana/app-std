<?php

namespace Database\Seeders;

use App\Models\Termin;
use Illuminate\Database\Seeder;

class TerminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $termin = [
            [
                'nama' => '1 Minggu',
                'lama_hari' => 7,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => '2 Minggu',
                'lama_hari' => 14,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => '3 Minggu',
                'lama_hari' => 21,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => '1 Bulan',
                'lama_hari' => 30,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        Termin::insert($termin);
    }
}
