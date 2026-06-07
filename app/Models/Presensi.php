<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $fillable = [

        'mahasiswa_id',
        'tanggal',
        'jam_masuk',
        'status',
        'foto_bukti',
        'distance'

    ];

    public function mahasiswa()
    {
        return $this->belongsTo(
            Mahasiswa::class
        );
    }
}
