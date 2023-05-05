
# Vehicle Sales API




## Installation

- Install all packages for vehicle-sales-api with `composer install`.
- Then run `php artisan migrate` to migrating all db.

    
## API Reference

#### Get, Add Kendaraan

```http
  GET | POST /api/kendaraan
```

#### Delete Kendaraan 

```http
  PUT | DELETE /api/kendaraan/${id}
```

#### JSON Example Kendaraan

```
{
  "tahun_keluaran": "2022",
  "kendaraan_sku":"LVN2022",
  "warna": "silver",
  "harga": 325000000,
  "nama": "Shogun",
  "stok": 25,
  "motor": {
    "mesin": "1125 cc",
    "kapasitas_penumpang": 7,
    "tipe": "LSUV"
  }
}
```

## Belum Selesai

- JWT Authentication
- Unit Test