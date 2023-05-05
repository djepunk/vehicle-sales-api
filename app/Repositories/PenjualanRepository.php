<?php

namespace App\Repositories;

use App\Models\Penjualan;
use App\Models\Kendaraan;

class PenjualanRepository implements PenjualanRepositoryInterface
{
  protected $pmodel;
  protected $kmodel;

  public function __construct(Penjualan $pmodel, Kendaraan $kmodel)
  {
    $this->pmodel = $pmodel;
    $this->kmodel = $kmodel;
  }

  public function penjualan($id, $request)
  {
    $kendaraan = $this->kmodel->findOrFail($id);

    if ($kendaraan->stok < $request->jumlah) {
      throw new \Exception('Stok tidak cukup');
    }

    $kendaraan->stok -= $request->jumlah;
    $kendaraan->save();

    $penjualan = new Penjualan();
    $penjualan->kendaraan_id      = $kendaraan->kendaraan_sku;
    $penjualan->tanggal_penjualan = $request->tanggal_penjualan;
    $penjualan->nama_pembeli      = $request->nama_pembeli;
    $penjualan->harga_jual        = $request->harga_jual;
    $penjualan->jumlah            = $request->jumlah;
    $penjualan->total_harga       = $request->total_harga;

    $penjualan->save();
  }
}
