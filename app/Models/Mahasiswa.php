<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'prodi',
        'password'
    ];

    public function presensis()
    {
        return $this->hasMany(
            Presensi::class
        );
    }

    public function faceMaster()
    {
        return $this->hasOne(
            FaceMaster::class
        );
    }
}