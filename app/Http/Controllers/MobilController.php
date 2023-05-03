<?php

namespace App\Http\Controllers;

use App\Repositories\MobilRepositoryInterface;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    protected $mobilRepository;
    public function __construct(MobilRepositoryInterface $mobilRepository)
    {
        $this->mobilRepository = $mobilRepository;
    }

    public function index()
    {
        $mobils = $this->mobilRepository->getAll();
        return response()->json($mobils);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $mobil = $this->mobilRepository->create($data);
        return response()->json($mobil, 201);
    }

    public function show($id)
    {
        $mobil = $this->mobilRepository->getById($id);
        return response()->json($mobil);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $mobil = $this->mobilRepository->update($id, $data);
        return response()->json($mobil);
    }

    public function destroy($id)
    {
        $this->mobilRepository->delete($id);
        return response()->json(null, 204);
    }
}
