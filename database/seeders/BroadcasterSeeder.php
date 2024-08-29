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
            'nama_broadcaster' => 'A. Raihan Gimnastiar',
            'no_hp' => '08817555811',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama_broadcaster' => 'A. Makmun Alji',
            'no_hp' => '08828666922',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama_broadcaster' => 'Makmun Alji',
            'no_hp' => '08828666923',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama_broadcaster' => 'Alji',
            'no_hp' => '08828666924',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama_broadcaster' => 'Makmun A.',
            'no_hp' => '08828666925',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama_broadcaster' => 'Almun',
            'no_hp' => '08828666926',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        [
            'nama_broadcaster' => 'Ananda',
            'no_hp' => '08828666927',
            'tanggal_bergabung' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ],
        ]);
    }
}
