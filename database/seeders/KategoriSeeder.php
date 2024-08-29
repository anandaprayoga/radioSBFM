<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'id' => 1,
                'nama_kategori' => 'Wisata',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'nama_kategori' => 'Kuliner',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'nama_kategori' => 'Kesehatan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 4,
                'nama_kategori' => 'Lingkungan',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 5,
                'nama_kategori' => 'Teknologi',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'nama_kategori' => 'Budaya',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 7,
                'nama_kategori' => 'Politik',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
