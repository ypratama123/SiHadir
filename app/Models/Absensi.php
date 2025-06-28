<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = [
        'user_id',
        'jadwal_id',
        'tanggal',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(\App\Models\JadwalKelas::class, 'jadwal_id');
    }
}
