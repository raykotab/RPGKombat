<?php

namespace App;

class Character {

    const MAX_HEALTH = 1000;
    protected int $health;
    protected int $level;
    protected bool $alive;
    protected bool $inRange;
    

    function __construct() {

        $this->health = self::MAX_HEALTH;
        $this->level = 1;
        $this->alive = true;
        
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
    
    
//     public function isInRange($pos1, $pos2): bool
//     {
//         $combatDistance =  $this->$attackCharacterPosition - $characterPosition;
    
//         if($combatDistance <= $attackRange) {
//             $this->isInRange('', '') = true;
//         }
        
    
    
    
    
// }   

?>