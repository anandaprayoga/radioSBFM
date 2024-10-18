<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
        [
            'username' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('secret'),
            'peran' => 'Superadmin',
            'created_at' => now(),
            'updated_at' => now()
        ],
        ]);
    }
}
