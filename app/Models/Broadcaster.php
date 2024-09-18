<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Broadcaster extends Model
{
    use HasFactory;

    protected $table = 'broadcaster';

    protected $fillable = [
        'nama_broadcaster',
        'no_hp',
        'tanggal_bergabung',
        'broadcaster_image',
    ];

    protected $nullable = [
        'status_broadcaster',
    ];

    public function jadwalsiaran()
    {
        return $this->belongsToMany(JadwalSiaran::class, 'broadcaster_jadwalsiaran', 'id_broadcaster', 'id_jadwal_siaran');
    }
}