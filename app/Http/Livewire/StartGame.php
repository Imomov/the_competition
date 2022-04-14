<?php

namespace App\Http\Livewire;

use App\Http\Controllers\WinnersOfTheFirstStepController;
use App\Services\GameEloquentService;
use Livewire\Component;
use App\Services\KnightEloquentService;
use App\Repositories\Eloquent\KnightRepository;
use App\Repositories\Eloquent\GameRepository;
use App\Services\KnightService;
use App\Http\Traits\HashTrait;

class StartGame extends Component
{
    use HashTrait;

    public $isShowBlock_1 = false;

    public $arKnights;
    public $arKnightsIds;
    public $successEmail;

    public function startGame(): void
    {
        $this->isShowBlock_1 === false ? $this->isShowBlock_1 = true : $this->isShowBlock_1 = false;

        $KnightService = new KnightService;

        //////////////////////////
        // Creating the Knights
        //////////////////////////
        $this->arKnights = $KnightService->createKnights();
        if (count($this->arKnights)) {
            $knightEloquentObj = new KnightEloquentService(new KnightRepository);
            foreach ($this->arKnights as $key=>$knight) {
                $this->arKnights[$key]['id'] = $knightEloquentObj->create($knight)->id;
                $this->arKnightsIds[] = $this->arKnights[$key]['id'];
            }
        }

        //////////////////////////
        // Game ID
        //////////////////////////
        $game = [];
        $gameEloquentObj = new GameEloquentService(new GameRepository());
        $game['hashid'] = $this->generateHash('games');
        $game['all_participants'] = $this->arKnightsIds;
        // A top of virtuosity will be made. The three most virtuous ones, meaning the
        // ones with the highest average of virtues, will move on to the next stage.
        $game['semi_finalists'] = $KnightService->calAvrgVirtues($this->arKnights);
        $gameEloquentObj->create($game);

        //////////////////////////
        // Send an Email
        //////////////////////////
        $this->successEmail = false;
        if ((new WinnersOfTheFirstStepController())->sendEmailToPrincess($game['semi_finalists'])) {
            $this->successEmail = true;
        }
    }

    public function render()
    {
        return view('livewire.start-game', [
            'knights' => $this->arKnights,
            'successEmail' => $this->successEmail
        ]);
    }
}
