<?php

namespace App\Http\Controllers;

use App\Repositories\KendaraanRepositoryInterface;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    protected $kendaraanRepository;

    public function __construct(KendaraanRepositoryInterface $kendaraanRepository)
    {
        $this->kendaraanRepository = $kendaraanRepository;
    }

    public function index()
    {
        $kendaraans = $this->kendaraanRepository->getAll();
        return response()->json($kendaraans);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $kendaraan = $this->kendaraanRepository->create($data);
        return response()->json($kendaraan, 201);
    }

    public function show($id)
    {
        $kendaraan = $this->kendaraanRepository->getById($id);
        return response()->json($kendaraan);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $kendaraan = $this->kendaraanRepository->update($id, $data);
        return response()->json($kendaraan);
    }

    public function destroy($id)
    {
        $this->kendaraanRepository->delete($id);
        return response()->json(null, 204);
    }

    public function getStokAll()
    {
        $stokKendaraan = $this->kendaraanRepository->getStokAll();

        return response()->json($stokKendaraan);
    }

    public function getStokMotor()
    {
        $stokKendaraan = $this->kendaraanRepository->getStokMotor();

        return response()->json($stokKendaraan);
    }

    public function getStokMobil()
    {
        $stokKendaraan = $this->kendaraanRepository->getStokMobil();

        return response()->json($stokKendaraan);
    }
}
