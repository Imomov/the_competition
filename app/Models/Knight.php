<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knight extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_combatant' => 'boolean',
    ];

    /**
     * Get the game details associated with the winner.
     */
    public function winner()
    {
        return $this->hasOne(Game::class, 'winner');
    }
}
