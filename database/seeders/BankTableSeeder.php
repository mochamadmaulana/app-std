<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bank = [
            [
                'nama' => 'BCA',
                'deskripsi' => 'Bank Central Asia',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'BRI',
                'deskripsi' => 'Bank Rakyat Indonesia',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        Bank::insert($bank);
    }
}
