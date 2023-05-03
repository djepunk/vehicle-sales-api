<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Kendaraan extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'kendaraans';

    protected $fillable = [
        'tahun_keluaran',
        'warna',
        'harga',
        'motor',
        'mobil'
    ];

    protected $embedded = ['motor', 'mobil'];

    public function motor()
    {
        return $this->embedsOne('App\Models\Motor');
    }

    public function mobil()
    {
        return $this->embedsOne('App\Models\Mobil');
    }

    // public function motor()
    // {
    //     return $this->hasOne(Motor::class);
    // }

    // public function mobil()
    // {
    //     return $this->hasOne(Mobil::class);
    // }
}
