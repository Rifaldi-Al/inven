<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use App\Models\User;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'id' => '1',
            'username' => 'Admin',
            'nip' => null,
            'name' => 'Admin',
            'kontak' => null,
            'email' => 'admin@admin.com',
            'password' => bcrypt('Admin1234!'),
        ]);
    }
}
