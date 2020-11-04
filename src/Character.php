<?php

namespace App;

class Character {

    private int $health;
    private int $level;
    private bool $alive;
   
    

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
        return $this->alive = true;
    }

    public function die(): bool
    {
       if($this->health <= 0)
        {
            return $this->alive=false;
        }

    }
  
    public function attacks($character, $damage)//: void
    {
        //$damage = rand(100, 250);
        $character->health -=$damage;

        if($character->health <= 0)
        {
            return $character->alive = false;
        }
    }

    public function heal($character, $curepoints)//: void
    {
        if($character->health + $curepoints > 1000)
        {
            return $character ->health = 1000;
        }

        if($character->alive == true)
        {
           return $character->health += $curepoints;
        }
        
        return;
    }
   
   
    
   
    

   
}   

?>