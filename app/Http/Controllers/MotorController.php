<?php

namespace App\Http\Controllers;

use App\Repositories\MotorRepositoryInterface;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    protected $motorRepository;

    public function __construct(MotorRepositoryInterface $motorRepository)
    {
        $this->motorRepository = $motorRepository;
    }

    public function index()
    {
        $motors = $this->motorRepository->getAll();
        return response()->json($motors);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $motor = $this->motorRepository->create($data);
        return response()->json($motor, 201);
    }

    public function show($id)
    {
        $motor = $this->motorRepository->getById($id);
        return response()->json($motor);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $motor = $this->motorRepository->update($id, $data);
        return response()->json($motor);
    }

    public function destroy($id)
    {
        $this->motorRepository->delete($id);
        return response()->json(null, 204);
    }
}
