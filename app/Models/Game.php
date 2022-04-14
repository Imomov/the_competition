<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'all_participants' => 'array',
        'semi_finalists' => 'array',
        'finalists' => 'array',
    ];

    /**
     * Get the knight who is the winner.
     */
    public function knight()
    {
        return $this->belongsTo(Knight::class, 'winner');
    }

    /**
     * Get the results of a game.
    */
    public function attacks()
    {
        return $this->hasMany(Attack::class);
    }
}
