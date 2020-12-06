<?php 
namespace App;

use App\Character;

class MeleeCharacter extends Character 
{

    const MAX_RANGE = 2; 
    public int $range;
    private int $characterPosition;


    public function __construct(int $characterPosition) {

        $this->range = self::MAX_RANGE;
        $this->characterPosition = $characterPosition;
    }

    public function isInRange($1, $2) {
        if($this->inRange == true) {
            $this->attacks($character, $damage);
        }
        return;
    }
}



