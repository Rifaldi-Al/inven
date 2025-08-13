<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name'=>'superadmin']);
        Role::create(['name'=>'admin-prodi']);
        Role::create(['name'=>'user']);
        
        Permission::create(['name'=>'tambah-user']);
        Permission::create(['name'=>'edit-user']);
        Permission::create(['name'=>'hapus-user']);
        Permission::create(['name'=>'lihat-user']);

        Permission::create(['name'=>'tambah-surat-masuk']);
        Permission::create(['name'=>'edit-surat-masuk']);
        Permission::create(['name'=>'hapus-surat-masuk']);
        Permission::create(['name'=>'lihat-surat-masuk']);

        Permission::create(['name'=>'tambah-surat-keluar']);
        Permission::create(['name'=>'edit-surat-keluar']);
        Permission::create(['name'=>'hapus-surat-keluar']);
        Permission::create(['name'=>'lihat-surat-keluar']);

        Permission::create(['name'=>'tambah-bidang']);
        Permission::create(['name'=>'edit-bidang']);
        Permission::create(['name'=>'hapus-bidang']);
        Permission::create(['name'=>'lihat-bidang']);

        Permission::create(['name'=>'tambah-jenis-bidang']);
        Permission::create(['name'=>'edit-jenis-bidang']);
        Permission::create(['name'=>'hapus-jenis-bidang']);
        Permission::create(['name'=>'lihat-jenis-bidang']);

        Permission::create(['name'=>'tambah-jabatan']);
        Permission::create(['name'=>'edit-jabatan']);
        Permission::create(['name'=>'hapus-jabatan']);
        Permission::create(['name'=>'lihat-jabatan']);

        Permission::create(['name'=>'tambah-template-surat']);
        Permission::create(['name'=>'edit-template-surat']);
        Permission::create(['name'=>'hapus-template-surat']);
        Permission::create(['name'=>'lihat-template-surat']);

        Permission::create(['name'=>'tambah-jenis-surat']);
        Permission::create(['name'=>'edit-jenis-surat']);
        Permission::create(['name'=>'hapus-jenis-surat']);
        Permission::create(['name'=>'lihat-jenis-surat']);

        Permission::create(['name'=>'tambah-hal']);
        Permission::create(['name'=>'edit-hal']);
        Permission::create(['name'=>'hapus-hal']);
        Permission::create(['name'=>'lihat-hal']);

        $roleAdmin = Role::findByName('superadmin');

        $roleAdmin->givePermissionTo('tambah-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('hapus-user');
        $roleAdmin->givePermissionTo('lihat-user');

        $roleAdmin->givePermissionTo('tambah-surat-masuk');
        $roleAdmin->givePermissionTo('edit-surat-masuk');
        $roleAdmin->givePermissionTo('hapus-surat-masuk');
        $roleAdmin->givePermissionTo('lihat-surat-masuk');

        $roleAdmin->givePermissionTo('tambah-surat-keluar');
        $roleAdmin->givePermissionTo('edit-surat-keluar');
        $roleAdmin->givePermissionTo('hapus-surat-keluar');
        $roleAdmin->givePermissionTo('lihat-surat-keluar');

        $roleAdmin->givePermissionTo('tambah-bidang');
        $roleAdmin->givePermissionTo('edit-bidang');
        $roleAdmin->givePermissionTo('hapus-bidang');
        $roleAdmin->givePermissionTo('lihat-bidang');

        $roleAdmin->givePermissionTo('tambah-jenis-bidang');
        $roleAdmin->givePermissionTo('edit-jenis-bidang');
        $roleAdmin->givePermissionTo('hapus-jenis-bidang');
        $roleAdmin->givePermissionTo('lihat-jenis-bidang');

        $roleAdmin->givePermissionTo('tambah-jabatan');
        $roleAdmin->givePermissionTo('edit-jabatan');
        $roleAdmin->givePermissionTo('hapus-jabatan');
        $roleAdmin->givePermissionTo('lihat-jabatan');

        $roleAdmin->givePermissionTo('tambah-template-surat');
        $roleAdmin->givePermissionTo('edit-template-surat');
        $roleAdmin->givePermissionTo('hapus-template-surat');
        $roleAdmin->givePermissionTo('lihat-template-surat');

        $roleAdmin->givePermissionTo('tambah-jenis-surat');
        $roleAdmin->givePermissionTo('edit-jenis-surat');
        $roleAdmin->givePermissionTo('hapus-jenis-surat');
        $roleAdmin->givePermissionTo('lihat-jenis-surat');

        $roleAdmin->givePermissionTo('tambah-hal');
        $roleAdmin->givePermissionTo('edit-hal');
        $roleAdmin->givePermissionTo('hapus-hal');
        $roleAdmin->givePermissionTo('lihat-hal');

        $roleAdminProdi = Role::findByName('admin-prodi');

        $roleAdminProdi->givePermissionTo('tambah-surat-masuk');
        $roleAdminProdi->givePermissionTo('edit-surat-masuk');
        $roleAdminProdi->givePermissionTo('hapus-surat-masuk');
        $roleAdminProdi->givePermissionTo('lihat-surat-masuk');

        $roleAdminProdi->givePermissionTo('tambah-surat-keluar');
        $roleAdminProdi->givePermissionTo('edit-surat-keluar');
        $roleAdminProdi->givePermissionTo('hapus-surat-keluar');
        $roleAdminProdi->givePermissionTo('lihat-surat-keluar');

        $roleUser = Role::findByName('user');

        $roleUser->givePermissionTo('lihat-surat-masuk');

        $roleUser->givePermissionTo('lihat-surat-keluar');

        $admin = User::where('username', 'Admin')->first();
        $admin->assignRole('superadmin');
    }
}
