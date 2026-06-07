<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class Presensi extends Model
{
    protected $table = 'presensis';

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
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}