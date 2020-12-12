<?php

namespace App;


class Character {

    const MAX_HEALTH = 1000;
    const MAX_POSITION = 100;
    const MIN_POSITION = 0;

    protected int $health;
    protected int $level;
    protected bool $alive;
    protected int $position;
    protected bool $ranged;
    protected int $attackRange;
    protected bool $inRange;

    function __construct(? bool $ranged, ? bool $inRange) {

        $this->health = self::MAX_HEALTH;
        $this->level = 1;
        $this->alive = true;
        $this->range = $ranged;
        $this->position = 0;
        $this->inRange = $inRange;
    }


    public function getHealth(): int
    {
        return $this->health;
    }


    public function setHealth(int $health): void
    {
        $this->health = $health;
    }


    public function getLevel(): int
    {
        return $this->level;
    }


    public function setLevel(int $level): void
    {
        $this->level = $level;
    }


    public function getRange(): int
    {
       return $this->attackRange;
    }


    public function setRange(): void 
    { 
        if($this->ranged == true) 
        {
        $this->attackrange = 20;
        }
        $this->attackRange = 2;

    }


    public function getPosition(): int
    {
        return $this->position;
    }


    public function setPosition(int $position): void
    {
        $this->position = $position;
    }



    public function isAlive(): bool
    {
        if($this->health <= 0)
        {
            return $this->alive = false;
        }
        return $this->alive = true;
    }


    public function die(): bool
    {
       if($this->health <= 0)
        {
            return $this->alive=false;
        }
    }
    

    public function heal($character, $curepoints)//: int
    {
        if($character->health + $curepoints > self::MAX_HEALTH)
        {
            return $character ->health = self::MAX_HEALTH;
        }

        if($character->alive == true && $this == $character)
        {
           $character->health += $curepoints;
        }
        
        return; 
    }

    // separar en tres funciones: 1- melee/ranged?, 2- get enemy position, 3- do the math
    function checkIsInRange($character->$position)//: bool 
    {//is melee or ranged?
        //if melee < 2, if ranged < 20

        $characterPosition = $character->getPosition();
        
        $combatDistance = $position - $characterPosition;
 
         if($this->range >= $combatDistance) 
         {
           $this->inRange = true;
         }
          $this->inRange = false;
    }

    
    public function attacks($character, int $damage): void
    {   
        
        if($this !== $character && $inRange == true)
        {
            
            if($this->level >= $character->level + 5 )
            {
                $damage = $damage + $damage/2;
                $character->health -= $damage;
                return;
            }
            
            elseif($this->level + 5 <= $character->level )
            {
                $damage = $damage/2;
                $character->health -= $damage;
                return;    
            }
            
            $character->health -=$damage;

        }
        return;
    }
    
}  
