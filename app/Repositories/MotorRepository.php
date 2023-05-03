<?php

namespace App\Repositories;

use App\Models\Motor;

class MotorRepository implements MotorRepositoryInterface
{
  protected $model;

  public function __construct(Motor $model)
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
}
