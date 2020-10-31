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

    public function getLevel(): int
    {
        return $this->level;
    }

    public function isAlive(): bool
    {
        return $this->alive;
    }

    public function attacks(): int
    {
        return rand(100, 250);
    }

    public function takeDamage($damage)
    {
        $this->health -= $damage;
    }

    public function die()
    {
        if($this->health<= 0)
        {
            return $this->alive=false;
        };
        return;
    }





   /* public function heal($fighter, Int $number)
    {
        if($fighter->isAlive == false) {
            return;
        }
        if($fighter->health 
            $fighter->health)
            return;
            $fighter->health = $fighter->health + $number;
    }*/
}   

?>