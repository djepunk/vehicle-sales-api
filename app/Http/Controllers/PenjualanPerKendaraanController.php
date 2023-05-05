<?php

namespace App\Http\Controllers;

use App\Repositories\PenjualanPerKendaraanRepositoryInterface;
use Illuminate\Http\Request;

class PenjualanPerKendaraanController extends Controller
{
    protected $penjualanPerKendaraanRepository;

    public function __construct(PenjualanPerKendaraanRepositoryInterface $penjualanPerKendaraanRepository)
    {
        $this->penjualanPerKendaraanRepository = $penjualanPerKendaraanRepository;
    }

    public function getPenjualanPerKendaraan()
    {
        $penjualanPerKendaraan = $this->penjualanPerKendaraanRepository->getPenjualanPerKendaraan();

        return response()->json($penjualanPerKendaraan);
    }
}
