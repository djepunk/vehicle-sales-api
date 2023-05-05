<?php

namespace App\Repositories;

use App\Models\Kendaraan;
use App\Models\Penjualan;
use App\Models\PenjualanPerKendaraan;

class PenjualanPerKendaraanRepository implements PenjualanPerKendaraanRepositoryInterface
{
  protected $model;

  public function __construct(Kendaraan $model)
  {
    $this->model = $model;
  }
  public function getPenjualanPerKendaraan()
  {
    /*$result = Kendaraan::raw(function ($collection) {
      return $collection->aggregate([
        [
          '$lookup' => [
            'from' => 'penjualans',
            // 'let' => ['kendaraan_ido' => '$_id'],
            'localField' => '_id',
            'foreignField' => 'kendaraan_id',
            // 'pipeline' => [
            //   [
            //     '$match' => [
            //       '$expr' => ['$eq' => ['$kendaraan_id', ['$toObjectId' => '$$kendaraan_ido']]]
            //     ]
            //   ],
            //   [
            //     '$group' => [
            //       '_id' => 0,
            //       'jumlah_terjual' => ['$sum' => '$jumlah']
            //     ]
            //   ]
            // ],
            'as' => 'penjualan'
            // 'from' => 'penjualans',
            // 'let' => ['kendaraan_id' => '$_id'],
            // 'pipeline' => [
            //   [
            //     '$match' => [
            //       '$expr' => ['$eq' => ['$kendaraan_id', ['$toObjectId' => '$$kendaraan_id']]]
            //     ]
            //   ],
            //   [
            //     '$group' => [
            //       '_id' => 0,
            //       'jumlah_terjual' => ['$sum' => '$jumlah']
            //     ]
            //   ]
            // ],
            // 'as' => 'penjualan'
          ]
        ],
        [
          '$unwind' => [
            'path' => '$penjualan',
            'preserveNullAndEmptyArrays' => true
          ]
        ],
        [
          '$group' => [
            '_id' => [
              // 'kendaraan_id' => '$penjualan.kendaraan_id',
              'kendaraan_id' => ['$toObjectId' => '$penjualan.kendaraan_id'],
              'nama_kendaraan' => '$nama',
              'total_nilai' => '$penjualan.total_harga'
            ],
          ]
        ],
        [
          '$project' => [
            // 'kendaraan_id' => '$_id.kendaraan_id',
            'kendaraan_id' => ['$toObjectId' => '$_id.kendaraan_id'],
            'nama_kendaraan' => '$_id.nama_kendaraan',
            'jumlah_terjual' => [
              '$sum' => [
                '$cond' => [
                  [
                    '$eq' => ['$penjualan', null]
                  ],
                  0,
                  '$penjualan.jumlah'
                ]
              ]
            ],
          ]
        ]
        // [
        //   '$project' => [
        //     'nama_kendaraan' => 1,
        //     'jumlah_terjual' => [
        //       '$ifNull' => ['$penjualan.jumlah_terjual', 0]
        //     ]
        //   ]
        // ]
      ]);
    });*/

    $result = Penjualan::raw(function ($collection) {
      return $collection->aggregate([
        [
          '$lookup' => [
            'from' => 'kendaraans',
            'localField' => 'kendaraan_id',
            'foreignField' => 'kendaraan_sku',
            'as' => 'kendaraan'
          ]
        ],
        [
          '$unwind' => [
            'path' => '$kendaraan',
            'preserveNullAndEmptyArrays' => true
          ]
        ],
        [
          '$group' => [
            '_id' => [
              'kendaraan_id' => '$kendaraan.kendaraan_sku',
              'nama_kendaraan' => '$kendaraan.nama'
            ],
            'jumlah_terjual' => ['$sum' => '$jumlah'],
          ]
        ],
        [
          '$project' => [
            'kendaraan_id' => ['$toString' => '$_id.kendaraan_id'],
            'nama_kendaraan' => '$_id.nama_kendaraan',
            'jumlah_terjual' => 1,
          ]
        ],
      ]);
    });

    // $result = Kendaraan::raw(function ($collection) {
    //   return $collection->aggregate([
    //     [
    //       '$lookup' => [
    //         'from' => 'penjualans',
    //         'localField' => '_id',
    //         'foreignField' => 'kendaraan_id',
    //         'as' => 'penjualan'
    //       ]
    //     ],
    //     [
    //       '$unwind' => [
    //         'path' => '$penjualan',
    //         'preserveNullAndEmptyArrays' => true
    //       ]
    //     ],
    //     [
    //       '$group' => [
    //         '_id' => [
    //           'kendaraan_id' => '$_id',
    //           'nama_kendaraan' => '$nama'
    //         ],
    //         'jumlah_terjual' => ['$sum' => '$penjualan.jumlah'],
    //       ]
    //     ],
    //     [
    //       '$project' => [
    //         // 'kendaraan_id' => ['$toString' => '$_id.kendaraan_id'],
    //         // 'nama_kendaraan' => '$_id.nama_kendaraan',
    //         // 'jumlah_terjual' => 1,
    //         '_id' => 0,
    //         'kendaraan_id' => ['$toString' => '$_id.kendaraan_id'],
    //         'nama_kendaraan' => '$_id.nama_kendaraan',
    //         'jumlah_terjual' => 1,
    //       ]
    //     ],
    //   ]);
    // });

    return $result;
  }
}
