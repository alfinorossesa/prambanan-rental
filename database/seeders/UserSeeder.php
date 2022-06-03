<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nama' => 'super admin',
            'email' => 'superadmin@admin.com',
            'alamat' => 'admin',
            'no_hp' => '99999999',
            'isAdmin' => 1,
            'password' => bcrypt('password')
        ]);
    }
}
