<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengunjung extends Model
{
    use HasFactory;
    protected $table = 'news_views';

    protected $fillable = [
        'informasi_id',
        'ip_address',
    ];
    public function informasi(){
        return $this->belongsTo(Informasi::class, 'informasi_id');
    }

}
