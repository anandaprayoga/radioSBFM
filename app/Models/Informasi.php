<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_kategori',
        'id_kategori',
        'tanggal_informasi',
        'isi_informasi',
        'gambar_informasi',
        'status_informasi',
        'tanggal_update',
    ];
}