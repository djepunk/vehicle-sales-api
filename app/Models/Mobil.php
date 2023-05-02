<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Mobil extends Kendaraan
{
    protected $collection = 'kendaraans';

    protected $fillable = [
        'mesin',
        'kapasitas_penumpang',
        'tipe',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
