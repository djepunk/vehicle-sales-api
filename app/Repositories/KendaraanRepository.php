<?php

namespace App\Repositories;

use App\Models\Kendaraan;

class KendaraanRepository implements KendaraanRepositoryInterface
{
  protected $model;

  public function __construct(Kendaraan $model)
  {
    $this->model = $model;
  }

  public function getAll()
  {
    return $this->model->all();
  }

  public function create(array $data)
  {
    return $this->model->create($data);
  }

  public function getById($id)
  {
    return $this->model->findOrFail($id);
  }

  public function update($id, array $data)
  {
    $model = $this->getById($id);
    $model->update($data);
    return $model;
  }

  public function delete($id)
  {
    $model = $this->getById($id);
    $model->delete();
  }

  public function getStokAll()
  {
    $stokKendaraan = Kendaraan::raw(function ($collection) {
      return $collection->aggregate([
        [
          '$group' => [
            '_id' => '$nama',
            'stok' => ['$sum' => '$stok']
          ]
        ]
      ]);
    });

    return $stokKendaraan;
  }

  public function getStokMotor()
  {
    $stokKendaraan = Kendaraan::raw(function ($collection) {
      return $collection->aggregate([
        [
          '$match' => [
            'motor' => [
              '$exists' => true,
              '$ne' => null
            ]
          ]
        ],
        [
          '$group' => [
            '_id' => '$nama',
            'stok' => ['$sum' => '$stok']
          ]
        ]
      ]);
    });

    return $stokKendaraan;
  }

  public function getStokMobil()
  {
    $stokKendaraan = Kendaraan::raw(function ($collection) {
      return $collection->aggregate([
        [
          '$match' => [
            'mobil' => [
              '$exists' => true,
              '$ne' => null
            ]
          ]
        ],
        [
          '$group' => [
            '_id' => '$nama',
            'stok' => ['$sum' => '$stok']
          ]
        ]
      ]);
    });

    return $stokKendaraan;
  }
}
