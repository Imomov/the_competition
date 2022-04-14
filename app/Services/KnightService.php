<?php

namespace App\Services;

use App\Repositories\Eloquent\KnightRepository;
use Ramsey\Collection\Collection;
use App\Http\Traits\NameFakeTrait;
use App\Http\Traits\HashTrait;

class KnightService
{
    use NameFakeTrait, HashTrait;

    private $arrKnights;
    private const ARR_VALUES = [83,100,67,82,51,66,35,50,19,34,1,18];
    private const ARR_VALUES_STRENGTH = [93,100,87,92,80,86,73,79,66,72,60,65];
    private const ARR_VALUES_DEFENSE = [54,60,47,53,40,46,33,39,26,32,20,25];

    private $avrgVirtues;

    /**
     * There are five knights in the kingdom, suitors to the princess's hand. Each one of them has the
     * following virtues, but in different proportions: Courage, Justice, Mercy, Generosity, Faith,
     * Nobility, Hope.
     * Also, each one of them has different degrees of Strength, Defense and Battle strategy.
     *
     * @return array
    */
    public function createKnights(): array
    {
        for ($i=0; $i<5; $i++) {
            $this->arrKnights[$i]['hashid'] = $this->generateHash('knights');
            $this->arrKnights[$i]['name'] = ($this->nameFake()) ?? "Saint George";
            $this->arrKnights[$i]['age'] = rand(20,25);
            $this->arrKnights[$i]['picture'] = 'https://randomuser.me/api/portraits/men/'.rand(1,99).'.jpg';

            // Nobility is random, no matter the age.
            $this->arrKnights[$i]['nobility'] = rand(1,100);

            /**
             * The older the knight, the more Courage, Justice and Faith he has;
             * The younger the knight, the more Mercy, Generosity and Hope he has;
             * The older the knight, the better he is on Strength;
             * The younger the knight, the better he is on Defense;
            */
            switch ($this->arrKnights[$i]['age']) {
                case 25:
                    $this->arrKnights[$i]['courage'] = rand(self::ARR_VALUES[0],self::ARR_VALUES[1]);
                    $this->arrKnights[$i]['justice'] = rand(self::ARR_VALUES[0],self::ARR_VALUES[1]);
                    $this->arrKnights[$i]['faith'] = rand(self::ARR_VALUES[0],self::ARR_VALUES[1]);

                    $this->arrKnights[$i]['mercy'] = rand(self::ARR_VALUES[10],self::ARR_VALUES[11]);
                    $this->arrKnights[$i]['generosity'] = rand(self::ARR_VALUES[10],self::ARR_VALUES[11]);
                    $this->arrKnights[$i]['hope'] = rand(self::ARR_VALUES[10],self::ARR_VALUES[11]);

                    $this->arrKnights[$i]['strength'] = rand(self::ARR_VALUES_STRENGTH[0],self::ARR_VALUES_STRENGTH[1]);
                    $this->arrKnights[$i]['defense'] = rand(self::ARR_VALUES_DEFENSE[10],self::ARR_VALUES_DEFENSE[11]);
                    break;
                case 24:
                    $this->arrKnights[$i]['courage'] = rand(self::ARR_VALUES[2],self::ARR_VALUES[3]);
                    $this->arrKnights[$i]['justice'] = rand(self::ARR_VALUES[2],self::ARR_VALUES[3]);
                    $this->arrKnights[$i]['faith'] = rand(self::ARR_VALUES[2],self::ARR_VALUES[3]);

                    $this->arrKnights[$i]['mercy'] = rand(self::ARR_VALUES[8],self::ARR_VALUES[9]);
                    $this->arrKnights[$i]['generosity'] = rand(self::ARR_VALUES[8],self::ARR_VALUES[9]);
                    $this->arrKnights[$i]['hope'] = rand(self::ARR_VALUES[8],self::ARR_VALUES[9]);

                    $this->arrKnights[$i]['strength'] = rand(self::ARR_VALUES_STRENGTH[2],self::ARR_VALUES_STRENGTH[3]);
                    $this->arrKnights[$i]['defense'] = rand(self::ARR_VALUES_DEFENSE[8],self::ARR_VALUES_DEFENSE[9]);
                    break;
                case 23:
                    $this->arrKnights[$i]['courage'] = rand(self::ARR_VALUES[4],self::ARR_VALUES[5]);
                    $this->arrKnights[$i]['justice'] = rand(self::ARR_VALUES[4],self::ARR_VALUES[5]);
                    $this->arrKnights[$i]['faith'] = rand(self::ARR_VALUES[4],self::ARR_VALUES[5]);

                    $this->arrKnights[$i]['mercy'] = rand(self::ARR_VALUES[6],self::ARR_VALUES[7]);
                    $this->arrKnights[$i]['generosity'] = rand(self::ARR_VALUES[6],self::ARR_VALUES[7]);
                    $this->arrKnights[$i]['hope'] = rand(self::ARR_VALUES[6],self::ARR_VALUES[7]);

                    $this->arrKnights[$i]['strength'] = rand(self::ARR_VALUES_STRENGTH[4],self::ARR_VALUES_STRENGTH[5]);
                    $this->arrKnights[$i]['defense'] = rand(self::ARR_VALUES_DEFENSE[6],self::ARR_VALUES_DEFENSE[7]);
                    break;
                case 22:
                    $this->arrKnights[$i]['courage'] = rand(self::ARR_VALUES[6],self::ARR_VALUES[7]);
                    $this->arrKnights[$i]['justice'] = rand(self::ARR_VALUES[6],self::ARR_VALUES[7]);
                    $this->arrKnights[$i]['faith'] = rand(self::ARR_VALUES[6],self::ARR_VALUES[7]);

                    $this->arrKnights[$i]['mercy'] = rand(self::ARR_VALUES[4],self::ARR_VALUES[5]);
                    $this->arrKnights[$i]['generosity'] = rand(self::ARR_VALUES[4],self::ARR_VALUES[5]);
                    $this->arrKnights[$i]['hope'] = rand(self::ARR_VALUES[4],self::ARR_VALUES[5]);

                    $this->arrKnights[$i]['strength'] = rand(self::ARR_VALUES_STRENGTH[6],self::ARR_VALUES_STRENGTH[7]);
                    $this->arrKnights[$i]['defense'] = rand(self::ARR_VALUES_DEFENSE[4],self::ARR_VALUES_DEFENSE[5]);
                    break;
                case 21:
                    $this->arrKnights[$i]['courage'] = rand(self::ARR_VALUES[8],self::ARR_VALUES[9]);
                    $this->arrKnights[$i]['justice'] = rand(self::ARR_VALUES[8],self::ARR_VALUES[9]);
                    $this->arrKnights[$i]['faith'] = rand(self::ARR_VALUES[8],self::ARR_VALUES[9]);

                    $this->arrKnights[$i]['mercy'] = rand(self::ARR_VALUES[2],self::ARR_VALUES[3]);
                    $this->arrKnights[$i]['generosity'] = rand(self::ARR_VALUES[2],self::ARR_VALUES[3]);
                    $this->arrKnights[$i]['hope'] = rand(self::ARR_VALUES[2],self::ARR_VALUES[3]);

                    $this->arrKnights[$i]['strength'] = rand(self::ARR_VALUES_STRENGTH[8],self::ARR_VALUES_STRENGTH[9]);
                    $this->arrKnights[$i]['defense'] = rand(self::ARR_VALUES_DEFENSE[2],self::ARR_VALUES_DEFENSE[3]);
                    break;
                case 20:
                    $this->arrKnights[$i]['courage'] = rand(self::ARR_VALUES[10],self::ARR_VALUES[11]);
                    $this->arrKnights[$i]['justice'] = rand(self::ARR_VALUES[10],self::ARR_VALUES[11]);
                    $this->arrKnights[$i]['faith'] = rand(self::ARR_VALUES[10],self::ARR_VALUES[11]);

                    $this->arrKnights[$i]['mercy'] = rand(self::ARR_VALUES[0],self::ARR_VALUES[1]);
                    $this->arrKnights[$i]['generosity'] = rand(self::ARR_VALUES[0],self::ARR_VALUES[1]);
                    $this->arrKnights[$i]['hope'] = rand(self::ARR_VALUES[0],self::ARR_VALUES[1]);

                    $this->arrKnights[$i]['strength'] = rand(self::ARR_VALUES_STRENGTH[10],self::ARR_VALUES_STRENGTH[11]);
                    $this->arrKnights[$i]['defense'] = rand(self::ARR_VALUES_DEFENSE[0],self::ARR_VALUES_DEFENSE[1]);
                    break;
            }

            // Battle strategy is random, no matter the age.
            $this->arrKnights[$i]['battle_strategy'] = rand(20,40);
        }
        return $this->arrKnights;
    }

    /**
     * A top of virtuosity will be made. The three most virtuous ones, meaning the
     * ones with the highest average of virtues, will move on to the next stage.
     *
     * @param $arrKnights
     * @return array
     */
    public function calAvrgVirtues($arrKnights): array
    {
        foreach ($arrKnights as $knight) {
            $this->avrgVirtues[$knight['id']] = (int)round(($knight['courage']+$knight['justice']+$knight['faith']+$knight['mercy']+$knight['generosity']+$knight['hope']+$knight['nobility']) / 7);
        }

        arsort($this->avrgVirtues, SORT_NUMERIC);
        reset($this->avrgVirtues);
        $res=[];
        foreach ($this->avrgVirtues as $key=>$value) {
            if (count($res)>2) {
                break;
            }
            $res[] = $key;
        }
        return $res;
    }
}
