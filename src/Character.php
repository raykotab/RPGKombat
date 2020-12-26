<?php

namespace App;


class Character implements IFaction {

    const MAX_HEALTH = 1000;
    const MAX_POSITION = 100;
    const MIN_POSITION = 0;
    const MAX_ATTACK_RANGE = 20;
    const MIN_ATTACK_RANGE = 2;

    protected int $health;
    protected int $level;
    protected bool $alive;
    protected int $position;
    protected ?bool $ranged;
    protected ?int $attackRange;
    protected array $factionNames = [];

    function __construct() {

        $this->health = self::MAX_HEALTH;
        $this->level = 1;
        $this->alive = true;
        $this->position = 0;
        $this->ranged = false;
        //$this->factionNames = [''];

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

   
    
    public function setAttackRange(bool $ranged)//: void 
    { 
        $this->ranged = $ranged;
        if($this->ranged == true) 
        {
            return $this->attackRange = self::MAX_ATTACK_RANGE;
        }
        if($this->ranged == false) {
        return $this->attackRange = self::MIN_ATTACK_RANGE;
        }  
    }
    
    
    public function getAttackRange(): int
    {
       return $this->attackRange;
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
    
    public function isInRange($enemyPosition) {

        $distanceToCombat = $enemyPosition - $this->position;
        if($distanceToCombat <= $this->attackRange) {
            $this->attacks;
        }
        return;

    }
    
    public function attacks($character, int $damage): void//pasar level por character const arg y extraer asi 
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
        return;
    }
    

    public function factionAffiliate(Faction $faction) {

        array_push($this->factionNames, $faction->getName());

    }

   public function factionRenegate(Faction $faction) {


   }

   public function getFactionNames () {

       return $this->factionNames;
           
    }
   

}  

