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

    // public function setFactionMembers($character) {

    //     if($character->factionNames !== [])
    //     array_push($this->factionMembers, $character);
        
    //     foreach($this->factionMembers as $character) {
    //         $character->setAllies();
    //     }
    // }

    // public function getFactionMembers() {

    //     return $this->factionMembers;
    // }
}









// class A {
// private $a   = 'private';
// protected $b = 'protected';
// public $c    = 'public';
// static $d    = 'static';
// public function __construct()
// {
//     $this->e = 'constructed';
// }
// public function __set($property, $value)
// {
//     echo ' set ' . $property . '=' . $value;
//     $this->$property=$value;
// }
// public function __get($property)
// {
//     echo ' get ' . $property;
//     $this->$property = 'dynamic';  // invokes __set() !!
//     return $this->$property;
// }
// }

// class B extends A
// {
// public function constructMe()
// {
//     $this->e = 'constructed2';
// }
// }

// class C extends B
// {
// public function __construct()
// {
//     parent::constructMe();
// }
// }

// echo " \n";
// $a = new A();
// $b = new B();
// echo " \n";
// echo ' B:c='.$b->c;
// echo " \n";
// echo ' B:d=' .$b->d;
// echo " \n";

// $c = new C();
// echo " \n";

// print_r($a);
// print_r($b);
// print_r($c);

// print_r(A::$d);
// print_r(B::$d);
// print_r(C::$d);

// echo 'A class: ';
// $R = new reflectionclass('A');
// print_r($R->getdefaultproperties());
// print_r($R->getstaticproperties());
// echo 'B class: ';
// $R = new reflectionclass('B');
// print_r($R->getdefaultproperties());
// print_r($R->getstaticproperties());

// ?>
