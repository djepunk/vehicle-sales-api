<?php

namespace App\Repositories;

interface MotorRepositoryInterface
{
  public function getAll();
  public function create(array $data);
  public function getById($id);
  public function update($id, array $data);
  public function delete($id);
}
