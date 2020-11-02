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
            return $this->alive=false && $this->canNotRevive();
        }
    }

   /* public function die(): bool
    {
        $this->setHealth(self::MIN_HEALTH);
        $this->alive = false;
    }*/

    /*public function attacks(Character $victim, int $damage): void
    {
        if($damage > $victim->getHealth()) {
            $victim->die();
            return;
        }
        $victim->setHealth($victim->getHealth() - $damage);
    }*/
    public function attacks($character, $damage): void
    {
        //$damage = rand(100, 250);
        $character->health -=$damage;
    }

    public function takeDamage($damage): void
    {
        $this->health -= $damage;{
            return;
        }

    }

    public function heal($character, $curepoints): void
    {
        $character->health += $curepoints;
    }
   
    // public function heal(Character $wounded, int $repair): void
    //{
      //  if($reapir + $wounded->getHealth() > self::MAX_HEALTH) {
        //    $wounded->setHealth(self::MAX_HEALTH);
          //  return;
        //}

       // $wounded->setHealth($wounded->getHealth() + $repair);
    //}

    
    public function canNotRevive()//: bool
    {
        if($damage < $dead->health) {

        }
            
            
            
            
            
            
         
    }
 

   
}   

?>