<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;
use App\Character;

class CharacterTest extends TestCase {

	

	public function test_if_Health_starts_1000(
	) {
		//escenario - given
		$sonGoku = new Character();
		//accion - when
		$result = $sonGoku->getHealth();
		//assert - then
		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{
		$sonGoku = new Character();

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}
	
	public function test_if_alive()
	{
		$sonGoku = new Character();

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{//escenario
		$attacker = new Character();
		$victim = new Character();

		//action

		$damage = $attacker->attacks();$victim->takeDamage($damage);

		//then
		$this->assertLessThan(1000, $victim->getHealth());
	}
	
	public function test_character_dead_if_health_is_0()
	{
		//given
		$sonGoku = new Character();
		//when
		$sonGoku->takeDamage(1000);
		$result = $sonGoku->getHealth();
		//then
		$this->assertEquals(false, $result);
		
	}
	
	public function test_if_heal_adds_repair_to_other_character()
	{
		//given
		$healer = new Character();
		$wounded = new Character();
		$woundedHealth = $wounded->getHealth(500);
		//when
		$repair = $healer->heal($woundedHealth);
		$wounded->getHealed($repair);
		//then
		$this->assertGreaterThan(500, $wounded->getHealth());

	}	
}


