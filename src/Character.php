<?php

namespace App;

class Character {

    private int $health;
    private int $level;
    private bool $alive;
   // const MAX_HEALTH = 1000;   
   // const MIN_HEALTH = 0; 
    

    function __construct() {

        $this->health = 1000;//self::Max_Health;
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

    public function isAlive(): bool
    {
        if($this->health <= 0){
            
            return $this->alive = false;
        }
        return $this->alive;
    }

    public function die(): bool
    {
       if($this->health <= 0)
        {
            return $this->alive=false;
        }
    }

  
    public function attacks($character, $damage): void
    {
        //$damage = rand(100, 250);
        $character->health -=$damage;
    }

    /*public function takeDamage($damage): void
    {
        $this->health -= $damage;{
            return;
        }

    }*/

    public function heal($character, $curepoints): void
    {
        $character->health += $curepoints;
    }
   
   
    
   
    

   
}   

?>