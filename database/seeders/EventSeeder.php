<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('event')->insert([
            [
                'nama_event' => 'Karnaval',
                'tanggal_mulai' => '2024-08-14',
                'tanggal_selesai' => '2024-08-15',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_event' => 'Lomba 17 Agustus',
                'tanggal_mulai' => '2024-08-18',
                'tanggal_selesai' => '2024-08-20',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_event' => 'Pesta Rakyat',
                'tanggal_mulai' => '2024-08-21',
                'tanggal_selesai' => '2024-08-25',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_event' => 'Pesta Rakyat',
                'tanggal_mulai' => '2024-08-14',
                'tanggal_selesai' => '2024-08-15',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_event' => 'Pesta Rakyat',
                'tanggal_mulai' => '2024-08-14',
                'tanggal_selesai' => '2024-08-15',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_event' => 'Pesta Rakyat',
                'tanggal_mulai' => '2024-08-14',
                'tanggal_selesai' => '2024-08-15',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_event' => 'Pesta Rakyat',
                'tanggal_mulai' => '2024-08-14',
                'tanggal_selesai' => '2024-08-15',
                'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum suscipit magna tellus, eget tristique ligula elementum a. Etiam elementum maximus suscipit.',
                'gambar_event' => 'Events/tDf9obveRzpnrzDZ7y3rDx4VCitgFoZbzJDv5kxF.jpg',
                'status_event' => 'null',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
