<?php

namespace App\Models;

class PenjualanPerKendaraan extends Kendaraan
{
    protected $collection = 'kendaraans';

    protected $fillable = [
        'kendaraan_id',
        'nama_kendaraan',
        'jumlah_terjual',
        'total_harga'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
