<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalSiaran;
use App\Models\Broadcaster;

class JadwalSiaranSeeder extends Seeder
{
    public function run(): void
    {
        // Buat jadwal siaran pertama
        $jadwalSiaran1 = JadwalSiaran::create([
            'judul' => 'Morning News',
            'hari' => 'Rabu',
            'waktu_mulai' => '06:00:00',
            'waktu_berakhir' => '10:00:00',
            'keterangan' => 'Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat jadwal siaran kedua
        $jadwalSiaran2 = JadwalSiaran::create([
            'judul' => 'Dapil',
            'hari' => 'Kamis',
            'waktu_mulai' => '10:00:00',
            'waktu_berakhir' => '14:00:00',
            'keterangan' => 'Lagu Dangdut Rancak + Pilihan (Berita Ringan)',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Hubungkan jadwal siaran pertama dengan semua broadcasters
        $jadwalSiaran1->broadcasters()->attach([1, 2]);

        // Hubungkan jadwal siaran kedua dengan semua broadcasters
        $jadwalSiaran2->broadcasters()->attach(3);
    }
}
