<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;
use App\Character;

class CharacterTest extends TestCase {

	
	public function test_if_Health_starts_1000() 
	{
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
	{
		//escenario
		$attacker = new Character();
		$victim = new Character();
		//action
		$attacker->attacks($victim, 100);
		//then
		$result = $victim->getHealth();

		$this->assertLessThan(1000, $result);
	
	}
	
	public function test_character_dead_if_health_is_0()
	{
		$sonGoku = new Character;
		$vegetal = new Character;

		$sonGoku->attacks($vegetal, 1000);
		$result = $vegetal->isAlive();

		$this->assertEquals(false, $result);
		
	}
	
	public function test_heal_wont_add_repair_to_other_character()
	{
		//given
		$healer = new Character();
		$wounded = new Character();
		//when
		$healer->attacks($wounded, 300);
		$healer->heal($wounded,100);
		//then
		$result = $wounded->getHealth();

		$this->assertEquals(700, $result);

	}	

	public function test_if_dead_cannot_be_healed()
	{
		//given
		$healer = new Character();
		$dead = new Character();
		$healer->attacks($dead, 1000);
		//when
		
		$result = $healer->heal($dead, 200);
		//then
		$this->assertEquals(0, $result);
		$this->assertEquals(false, $dead->isAlive());
	}

	public function test_if_heal_cannot_raise_health_above_1000()
	{
		$healer = new Character();
		$ryu = new Character();

		$result = $healer->heal($ryu, 200);

		$this->assertEquals(1000, $result);
	}

	public function test_if_character_can_deal_itself_damage()
	{
		$character = new Character();
	
		
		$result = $character->attacks($character, 100);

		$this->assertEquals(1000, $character->getHealth());
	}

	public function test_if_charachter_can_only_heal_itself()
	{
		$selfHealer = new Character();
		$notHealed = new Character();

		$notHealed->attacks($selfHealer, 500);
		$selfHealer->attacks($notHealed, 600);

		$selfHealer->heal($selfHealer, 200);
		$selfHealer->heal($notHealed, 200);

		$resultpositive = $selfHealer->getHealth();
		$resultnegative = $notHealed->getHealth();

		$this->assertEquals(700, $resultpositive);
		$this->assertEquals(400, $resultnegative);
	}

	public function test_if_damage_reduced_50_percent_against_victim_5_levels_above()
	{
		$superman = new Character();
		$superlopez = new Character();
		$superman->setLevel(6);

		$superlopez->attacks($superman, 200);

		$result = $superman->getHealth();

		$this->assertEquals(900, $result);

	}

	public function test_if_damage_augmented_50_percent_against_victim_5_levels_below()
	{
		$superman = new Character();
		$superlopez = new Character();
		$superman->setLevel(6);

		$superman->attacks($superlopez, 200);

		$result = $superlopez->getHealth();
		
		$this->assertEquals(700, $result);

	}

	public function test_if_character_has_a_max_attack_range()
	{
		$superman = new Character();
		$superlopez = new Character();
		$superman->setAttackRange(40);
		$superlopez->setAttackRange(20);
		$superman->setCharacterPosition();
		$superlopez->setCharacterPosition();
		getRangeBetweenCombattants();

		$superman->attacks($superlopez, 200);
		$superlopez->attacks($superman, 200);

		$resultPositive = $superlopez->getHealth();
		$resultNegative = $superman->getHealth();
		
		$this->assertEquals(800, $resultPositive);
		$this->assertEquals(1000, $resultNegative);

	}

}