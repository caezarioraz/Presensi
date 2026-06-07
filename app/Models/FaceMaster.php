<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FaceMaster extends Model
{
    protected $fillable = [

        'mahasiswa_id',
        'foto',
        'encoding',
        'tanggal_registrasi'

    ];
}
