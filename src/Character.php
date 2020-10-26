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

    public function attack($damage, $health): int
    {
        return $damagedHealth - $damage;
    }

    public function getDamaged($damage, $health): int
    {
        return $damagedHealth - $damage;
    }
}   

?>