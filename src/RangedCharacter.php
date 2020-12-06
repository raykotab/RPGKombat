<?php 

namespace App;

use App\Character;

class RangedCharacter extends Character 
{

    const MAX_RANGE = 20; 
    public int $range;
    private int $characterPosition;


    public function __construct(int $characterPosition) {

        $this->range = self::MAX_RANGE;
        $this->characterPosition = $characterPosition;
    }
}