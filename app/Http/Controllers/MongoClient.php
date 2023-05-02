<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MongoDb\Client as MongoClientTest;

class MongoClient extends Controller
{
    public function __construct()
    {
        $client = new MongoClientTest('mongodb://localhost:27017');
        try {
            // melakukan koneksi ke MongoDB
            $client->selectDatabase('test')->command(['ping' => 1]);
            echo "Koneksi berhasil";
        } catch (\Throwable $e) {
            echo "Koneksi gagal: " . $e->getMessage();
        }
    }
}
