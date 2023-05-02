<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository
{
  protected $model;

  public function __construct(Kendaraan $kendaraan)
  {
    $this->model = $kendaraan;
  }

  public function getAll(): Object
  {
    // return $this->model->get();
    return $this->model->with('mobil', 'motor')->get();
  }

  public function getById($id): Object
  {
    return $this->model->with('mobil', 'motor')->find($id);
  }

  public function create($data)
  {
    $newData = new $this->model;
    $newData->tahun_keluaran = $data['tahun_keluaran'];
    return $newData->save();
    // return $this->model->create($data);
  }

  public function update($id, $data): Object
  {
    $kendaraan = $this->model->findOrFail($id)->update($data);
    return $kendaraan;
  }

  public function delete($id): Object
  {
    $kendaraan = $this->model->findOrFail($id)->delete();
    return $kendaraan;
  }
}
