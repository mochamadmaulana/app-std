<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = User::create([
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
        ]);
        $role_administrator = Role::create([
            'name' => 'Administrator',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $administrator->assignRole($role_administrator);

        $direktur_utama = User::create([
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
        ]);
        $role_direktur_utama = Role::create([
            'name' => 'Direktur Utama',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $direktur_utama->assignRole($role_direktur_utama);

        $direktur_operasional = User::create([
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
        ]);
        $role_direktur_operasional = Role::create([
            'name' => 'Direktur Operasional',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $direktur_operasional->assignRole($role_direktur_operasional);

        $akuntan1 = User::create([
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
        ]);
        $akuntan2 = User::create([
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
        ]);
        $role_akuntan = Role::create([
            'name' => 'Akuntan',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $akuntan1->assignRole($role_akuntan);
        $akuntan2->assignRole($role_akuntan);

        $marketing = User::create([
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
        ]);
        $role_marketing = Role::create([
            'name' => 'Marketing',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $marketing->assignRole($role_marketing);

        $kepala_gudang = User::create([
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
        ]);
        $role_kepala_gudang = Role::create([
            'name' => 'Kepala Gudang',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $kepala_gudang->assignRole($role_kepala_gudang);

        $sales1 = User::create([
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
        ]);
        $sales2 = User::create([
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
        ]);
        $role_sales = Role::create([
            'name' => 'Sales',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $sales1->assignRole($role_sales);
        $sales2->assignRole($role_sales);

        $kuli = User::create([
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
        ]);
        $role_kuli = Role::create([
            'name' => 'Kuli',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $kuli->assignRole($role_kuli);

        $supir = User::create([
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
        ]);
        $role_supir = Role::create([
            'name' => 'Supir',
            'created_at' => new \DateTime,
            'updated_at' => new \DateTime
        ]);
        $supir->assignRole($role_supir);
    }
}
