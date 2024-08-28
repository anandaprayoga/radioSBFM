<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'event';

    protected $fillable = [
        'nama_event',
        'tanggal_mulai',
        'tanggal_selesai',
        'keterangan',
        'gambar_event',
    ];

    protected $nullable = [
        'status_event',
    ];
}
