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
                'nama' => '7 Hari',
                'lama_hari' => 7,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => '14 Hari',
                'lama_hari' => 14,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => '21 Hari',
                'lama_hari' => 21,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => '30 Hari',
                'lama_hari' => 30,
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        Termin::insert($termin);
    }
}
