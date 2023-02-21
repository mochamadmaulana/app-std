<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $permission = [
        //     [
        //         'name' => 'create kategori produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view kategori produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit kategori produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete kategori produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create satuan produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view satuan produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit satuan produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete satuan produk',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create termin',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view termin',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit termin',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete termin',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create role',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view role',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit role',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete role',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create pemasok',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view pemasok',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit pemasok',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete pemasok',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create rekening bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view rekening bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit rekening bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete rekening bank',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create pegawai',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view pegawai',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit pegawai',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete pegawai',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'create role akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'view role akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'edit role akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        //     [
        //         'name' => 'delete role akses',
        //         'created_at' => new \DateTime,
        //         'updated_at' => new \DateTime
        //     ],
        // ];
        Permission::insert([
            [
                'name' => 'create kategori produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view kategori produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit kategori produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete kategori produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create satuan produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view satuan produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit satuan produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete satuan produk',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create termin',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view termin',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit termin',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete termin',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create role',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view role',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit role',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete role',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create pemasok',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view pemasok',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit pemasok',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete pemasok',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create rekening bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view rekening bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit rekening bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete rekening bank',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create pegawai',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view pegawai',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit pegawai',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete pegawai',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'create role akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'view role akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'edit role akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ],
            [
                'name' => 'delete role akses',
                'guard_name' => 'web',
                'created_at' => new \DateTime,
                'updated_at' => new \DateTime
            ]
        ]);
    }
}
