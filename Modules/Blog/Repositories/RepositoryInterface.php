<?php

namespace App\Models\Repositories;

interface RepositoryInterface
{
public function query();

public function all();

public function getOneById(int $id);

public function delete(int $id);
}
