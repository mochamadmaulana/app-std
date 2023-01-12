<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama_lengkap' => 'Mochamad Maulana',
                'username' => 'mochamadmaulana',
                'email' => 'mochamad.maulana@raharja.info',
                'jabatan_id' => 1,
                'hak_akses' => 'Administrator',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'Enjel',
                'username' => 'enjel',
                'email' => 'enjel@gmail.com',
                'jabatan_id' => 2,
                'hak_akses' => 'Keuangan',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'Nunu',
                'username' => 'nunu',
                'email' => 'nunu@gmail.com',
                'jabatan_id' => 3,
                'hak_akses' => 'Pembukuan',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'Arab',
                'username' => 'arab',
                'email' => 'arab@gmail.com',
                'jabatan_id' => 4,
                'hak_akses' => 'Sales',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'Kawai',
                'username' => 'kawai',
                'email' => 'kawai@gmail.com',
                'jabatan_id' => 4,
                'hak_akses' => 'Sales',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'Manajer',
                'username' => 'manajer',
                'email' => 'manajer@gmail.com',
                'jabatan_id' => 5,
                'hak_akses' => 'Manajer',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'Edi Darmawan',
                'username' => 'edidarmawan',
                'email' => 'edidarmawan@gmail.com',
                'jabatan_id' => 6,
                'hak_akses' => 'Owner',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama_lengkap' => 'User',
                'username' => 'user',
                'email' => 'user@gmail.com',
                'jabatan_id' => 7,
                'hak_akses' => 'User',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
        ];
        User::insert($user);
    }
}
