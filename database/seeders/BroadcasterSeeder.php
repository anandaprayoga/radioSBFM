<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BroadcasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('broadcaster')->insert([
        [
            'id' => 1,
            'nama_broadcaster' => 'A. Raihan Gimnastiar',
            'no_hp' => '08817555811',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'id' => 2,
            'nama_broadcaster' => 'A. Makmun Alji',
            'no_hp' => '08828666922',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        ]);
    }
}
