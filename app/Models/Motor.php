<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Motor extends Kendaraan
{
    protected $collection = 'kendaraans';

    protected $fillable = [
        'mesin',
        'tipe_suspensi',
        'tipe_transmisi',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
