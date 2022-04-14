<?php

namespace App\Http\Controllers;

use App\Models\Knight;
use App\Models\Princess;
use App\Notifications\WinnersOfTheFirstStep;
use Illuminate\Http\Request;

class WinnersOfTheFirstStepController extends Controller
{
    public function sendEmailToPrincess($arrKnihgtIds): bool
    {
        $winnersData=[];
        foreach ($arrKnihgtIds as $KnihgtId) {
            $knights = Knight::find($KnihgtId)->toArray();
            $winnersData[] = [
                'name' => $knights['name'],
                'hashid' => $knights['hashid'],
                'picture' => $knights['picture'],
                'age' => $knights['age'],
                'courage' => $knights['courage'],
                'justice' => $knights['justice'],
                'mercy' => $knights['mercy'],
                'generosity' => $knights['generosity'],
                'faith' => $knights['faith'],
                'nobility' => $knights['nobility'],
                'hope' => $knights['hope'],
                'strength' => $knights['strength'],
                'defense' => $knights['defense'],
                'battle_strategy' => $knights['battle_strategy'],
            ];
        }

        $princess = Princess::first();

        $princess->notify(new WinnersOfTheFirstStep($winnersData));

        return true;
    }
}
