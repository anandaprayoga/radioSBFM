<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSiaran extends Model
{

    use HasFactory;

    protected $table = 'jadwalsiaran';

    protected $fillable = [
        'judul',
        'hari',
        'waktu_mulai',
        'waktu_berakhir',
    ];

    protected $nullable = [
        'keterangan',
    ];

    public function broadcasters()
    {
        return $this->belongsToMany(Broadcaster::class, 'broadcaster_jadwalsiaran', 'id_jadwal_siaran', 'id_broadcaster');
    }
}
