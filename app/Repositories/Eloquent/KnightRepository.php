<?php

namespace App\Repositories\Eloquent;

use App\Models\Knight;
use App\Repositories\Interfaces\KnightRepositoryInterface;

class KnightRepository implements KnightRepositoryInterface
{
    public function find($id)
    {
        return Knight::find($id);
    }

    public function getAll()
    {
        return Knight::all();
    }

    public function create($data)
    {
        return Knight::create($data);
    }

    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete($id)
    {
        Knight::destroy($id);
    }
}
