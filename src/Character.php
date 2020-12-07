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
    protected bool $range;
    protected int $attackRange;
    

    function __construct(bool $range = NULL) {

        $this->health = self::MAX_HEALTH;
        $this->level = 1;
        $this->alive = true;
        $this->range = $range;
        
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
       return $this->range;
    }

    public function setRange() 
    { 
        if($this->range == true) 
        {
        $this->attackrange = 20;
        }
        $this->attackRange = 2;

    }

    public function getPosition(): int
    {
        return $this->position;
    }


    public function setPosition(int $position): int
    {
        return $this->position = $position;
    }



    public function isAlive(): bool
    {
        if($this->health <= 0){
            
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
    

    public function heal($character, $curepoints)//: void
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


   public function checkLevelDifference($character) 
   {


   }
    
    public function attacks($character, int $damage): void
    {   
        
        if($this !== $character)
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
    }
    
}  
