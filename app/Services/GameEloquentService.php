<?php

namespace App\Services;

use App\Repositories\Interfaces\KnightRepositoryInterface;

class GameEloquentService
{
    private $repository;

    public function __construct(KnightRepositoryInterface $knightRepository)
    {
        $this->repository = $knightRepository;
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }

    public function index()
    {
        return $this->repository->getAll();
    }

    public function create(array $attributes)
    {
        return $this->repository->create($attributes);
    }

    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->repository->delete($id);
    }
}
