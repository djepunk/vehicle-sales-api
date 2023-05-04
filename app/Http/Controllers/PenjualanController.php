<?php

namespace App\Http\Controllers;

use App\Repositories\PenjualanRepositoryInterface;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    protected $penjualanRepository;

    public function __construct(PenjualanRepositoryInterface $penjualanRepository)
    {
        $this->penjualanRepository = $penjualanRepository;
    }

    public function penjualan(Request $request, $id)
    {
        $this->validate($request, [
            'jumlah' => 'required|integer|min:1'
        ]);

        $this->penjualanRepository->penjualan($id, $request);

        return response()->json([
            'message' => 'Penjualan berhasil'
        ]);
    }
}
