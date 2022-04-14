<?php

namespace App\Repositories\Eloquent;

use App\Models\Game;
use App\Repositories\Interfaces\KnightRepositoryInterface;

class GameRepository implements KnightRepositoryInterface
{
    public function find($id)
    {
        return Game::find($id);
    }

    public function getAll()
    {
        return Game::all();
    }

    public function create($data)
    {
        return Game::create($data);
    }

    public function update($id, $data)
    {
        return $this->find($id)->update($data);
    }

    public function delete($id)
    {
        Game::destroy($id);
    }
}
