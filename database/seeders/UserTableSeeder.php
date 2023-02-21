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
                'nama' => 'Mochamad Maulana',
                'panggilan' => 'Maull',
                'username' => 'mochamadmaulana',
                'email' => 'mochamad.maulana@raharja.info',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Angel',
                'panggilan' => 'Angel',
                'username' => 'angel',
                'email' => 'angel@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Nunu',
                'panggilan' => 'Nunu',
                'username' => 'nunu',
                'email' => 'nunu@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Arab',
                'panggilan' => 'Arab',
                'username' => 'arab',
                'email' => 'arab@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Kawai',
                'panggilan' => 'Kawai',
                'username' => 'kawai',
                'email' => 'kawai@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Kevin',
                'panggilan' => 'Kevin',
                'username' => 'kevin',
                'email' => 'kevinr@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Edy Dharmawan',
                'panggilan' => 'Khode',
                'username' => 'edydharmawan',
                'email' => 'edydharmawan@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Wawan',
                'panggilan' => 'Wawan',
                'username' => 'wawan',
                'email' => 'wawan@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Dede',
                'panggilan' => 'Dede',
                'username' => 'dede',
                'email' => 'dede@example.test',
                'status' => 'Staff',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Ramli',
                'panggilan' => 'Ramli',
                'username' => 'ramli',
                'email' => 'ramli@example.test',
                'status' => 'Harian Lepas',
                'avatar' => 'default.jpg',
                'aktif' => 1,
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'nama' => 'Pak RT',
                'panggilan' => 'Pak RT',
                'username' => 'parete',
                'email' => 'parete@example.test',
                'status' => 'Harian Lepas',
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
