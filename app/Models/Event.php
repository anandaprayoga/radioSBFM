<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_event',
        'tanggal_mulai',
        'tanggal_berakhir',
        'keterangan',
        'gambar_event',
        'status_event',
    ];
}
