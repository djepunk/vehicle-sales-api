<?php

namespace App\Http\Controllers;

use App\Services\KendaraanService;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    protected $kendaraanService;

    public function __construct(KendaraanService $kendaraanService)
    {
        $this->kendaraanService = $kendaraanService;
    }

    public function getKendaraan()
    {
        try {
            $result =  $this->kendaraanService->getAll();
        } catch (\Throwable $th) {
            $result = [
                'status' => 500,
                'error' => $th->getMessage()
            ];
        }

        return response()->json($result);
    }

    public function addKendaraan(Request $request)
    {
        $result = ['status' => 201];
        try {
            $result['data'] =  $this->kendaraanService->create($request);
        } catch (\Throwable $th) {
            $result = [
                'status' => 422,
                'error' => $th->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
