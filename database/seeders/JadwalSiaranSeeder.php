<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JadwalSiaran;
use App\Models\Broadcaster;

class JadwalSiaranSeeder extends Seeder
{
    public function run(): void
    {
        // Buat jadwal siaran
        $jadwalSiaran = JadwalSiaran::create([
            'judul' => 'Morning News',
            'hari' => 'Rabu',
            'waktu_mulai' => '06:00:00',
            'waktu_berakhir' => '10:00:00',
            'keterangan' => 'Lagu Pop Kreatif Indonesia dan Mancanegara (Berita Lokal Bangkalan + Prakiraan Cuaca)',
        ]);

        // Ambil id broadcaster yang ada
        $broadcasterIds = Broadcaster::pluck('id')->toArray();

        // Hubungkan jadwal siaran dengan broadcaster
        $jadwalSiaran->broadcasters()->attach($broadcasterIds);
    }
}
