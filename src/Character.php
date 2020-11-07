<?php

namespace App;

class Character {

    private int $health;
    private int $level;
    private bool $alive;
   
    

    function __construct() {

        $this->health = 1000;
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
  
    public function attacks($character, int $damage)//: void
    {   
        if($this !== $character)
        {
            $character->health -=$damage;
        
        }
        

        if($character->health <= 0)
        {
            return $character->alive = false;
        }
        
        $this->getHealth();

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