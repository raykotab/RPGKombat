<?php 

namespace App;

class Prop {

    public string $name;
    public int $health;

    public function __construct(string $name, int $health)
    {
        $this->name = $name;
        $this->health = $health;
        $this->inRange = false;
    }

    public function getName() 
    {
        return $this->name;
    }

    public function getHealth() 
    {
        return $this->health;
    }

    public function setHealth(int $health)
    {
        $this->health = $health;
    }
}

