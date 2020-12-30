<?php

namespace App;



class Faction {

    protected string $name;
    protected array $factionMembers = [];

    public function __construct($name) {

        $this->name = $name;
    }

    public function getName() {
        
        return $this->name;
    }

   
}


 ?>
