<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalKelas extends Model
{
    protected $fillable = [
        'nama_kelas',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'keterangan',
    ];
}
