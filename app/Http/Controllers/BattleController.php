<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Knight;
use App\Models\Attack;

class BattleController extends Controller
{
    private $knightFinalists;
    private $arAttacks;
    private $winner;
    private $gameId;

    public function startTheBattle($hashid)
    {
        $exclludedKnightId = Knight::where('hashid', $hashid)->first()->id;
        $semi_finalists = Game::whereJsonContains('semi_finalists',[$exclludedKnightId])->first()->semi_finalists;

        // Exclude the knight
        if (($key = array_search($exclludedKnightId, $semi_finalists)) !== false) {
            unset($semi_finalists[$key]);
        }
        sort($semi_finalists);

        /////////////////
        /// Finalists
        /////////////////
        $knightFinalists_1 = Knight::find($semi_finalists[0]);
        $knightFinalists_2 = Knight::find($semi_finalists[1]);

        /////////////////
        /// Battle
        /////////////////
        // The first attack is done by the player with the higher Battle strategy value. If both players have
        // the same value, then the attack is carried on by the player with the highest Strength.
        if ($knightFinalists_1->battle_strategy > $knightFinalists_2->battle_strategy) {
            $this->knightFinalists[0] = $knightFinalists_1;
            $this->knightFinalists[1] = $knightFinalists_2;
        } elseif ($knightFinalists_1->battle_strategy < $knightFinalists_2->battle_strategy) {
            $this->knightFinalists[0] = $knightFinalists_2;
            $this->knightFinalists[1] = $knightFinalists_1;
        } else {
            if ($knightFinalists_1->strength > $knightFinalists_2->strength) {
                $this->knightFinalists[0] = $knightFinalists_1;
                $this->knightFinalists[1] = $knightFinalists_2;
            } elseif ($knightFinalists_1->strength < $knightFinalists_2->strength) {
                $this->knightFinalists[0] = $knightFinalists_2;
                $this->knightFinalists[1] = $knightFinalists_1;
            }
        }
        // There will be a total of four attacks.
        for ($i=0; $i<4; $i++) {
            $damage = 0;
            if ($i % 2 == 0) {
                $damage = $this->attack($this->knightFinalists, 0, 1);
                $this->knightFinalists[1]['health'] -= $damage;
                $this->knightFinalists[1]['health'] = max($this->knightFinalists[1]['health'], 0);

                $this->arAttacks[$i]['attack_number'] = $i + 1;
                $this->arAttacks[$i]['what_happened'] = "Attack is done by the ".$this->knightFinalists[0]['name'];
                $this->arAttacks[$i]['the_damage_done'] = $damage;
                $this->arAttacks[$i]['defenders_health_left'] = $this->knightFinalists[1]['health'];

                if ($this->knightFinalists[1]['health'] < 20) {
                    // winner
                    $this->winner = $this->knightFinalists[0]['id'];
                    break;
                }
            } else {
                $damage = $this->attack($this->knightFinalists, 1, 0);
                $this->knightFinalists[0]['health'] -= $damage;
                $this->knightFinalists[0]['health'] = max($this->knightFinalists[0]['health'], 0);

                $this->arAttacks[$i]['attack_number'] = $i + 1;
                $this->arAttacks[$i]['what_happened'] = "Attack is done by the ".$this->knightFinalists[1]['name'];
                $this->arAttacks[$i]['the_damage_done'] = $damage;
                $this->arAttacks[$i]['defenders_health_left'] = $this->knightFinalists[0]['health'];

                if ($this->knightFinalists[0]['health'] < 20) {
                    // winner
                    $this->winner = $this->knightFinalists[1]['id'];
                    break;
                }
            }
        }

        /////////////////
        /// Save to DB
        /////////////////
        // health
        if ($knightFinalists_1->id === $this->knightFinalists[0]['id']) {
            $knightFinalists_1->health = $this->knightFinalists[0]['health'];
            $knightFinalists_1->save();
        } else {
            $knightFinalists_1->health = $this->knightFinalists[1]['health'];
            $knightFinalists_1->save();
        }
        if ($knightFinalists_2->id === $this->knightFinalists[0]['id']) {
            $knightFinalists_2->health = $this->knightFinalists[0]['health'];
            $knightFinalists_2->save();
        } else {
            $knightFinalists_2->health = $this->knightFinalists[1]['health'];
            $knightFinalists_2->save();
        }

        // attack records
        $this->gameId = Game::whereJsonContains('semi_finalists',[$exclludedKnightId])->first()->id;
        $cnt = count($this->arAttacks);
        for ($i=0; $i < $cnt; $i++) {
            $attackObj = new Attack;
            $attackObj->game_id = $this->gameId;
            $attackObj->attack_number = $this->arAttacks[$i]['attack_number'];
            $attackObj->what_happened = $this->arAttacks[$i]['what_happened'];
            $attackObj->the_damage_done = $this->arAttacks[$i]['the_damage_done'];
            $attackObj->defenders_health_left = $this->arAttacks[$i]['defenders_health_left'];
            $attackObj->save();
        }

        // record game finalists and the winner
        $game = Game::find($this->gameId);
        foreach ($this->knightFinalists as $finalist) {
            $options = $game->finalists;
            $options[] = $finalist['id'];
            $game->finalists = $options;
            $game->save();
        }
        $game->winner = $this->winner;
        $game->save();

        return view('result', [
            'finalists' => $this->knightFinalists,
            'arAttacks' => $this->arAttacks,
            'winner' => ($this->knightFinalists[0]['id'] === $this->winner) ? $this->knightFinalists[0] : $this->knightFinalists[1]
        ]);
    }

    public function attack($knightFinalists, $a, $d): int
    {
        return (int)round(($knightFinalists[$a]['strength']) + (($knightFinalists[$a]['strength'] * $knightFinalists[$a]['battle_strategy'])/100) - ($knightFinalists[$d]['defense']));
    }
}
