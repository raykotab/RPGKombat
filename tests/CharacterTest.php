<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;
use App\Character;
use App\Faction;
use FFI\CData;

class CharacterTest extends TestCase {

	//It. 1

	public function test_if_Health_starts_1000() 
	{
		$sonGoku = new Character();
		$result = $sonGoku->getHealth();
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
		$attacker = new Character();
		$victim = new Character();
		$attacker->attacks($victim, 100);
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
		$healer = new Character();
		$wounded = new Character();
		$healer->attacks($wounded, 300);
		$healer->heal($wounded,100);
		$result = $wounded->getHealth();

		$this->assertEquals(700, $result);

	}	

	public function test_if_dead_cannot_be_healed()
	{
		$healer = new Character();
		$dead = new Character();
		$healer->attacks($dead, 1000);
		
		$result = $healer->heal($dead, 200);
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


	//It. 2

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

	//It. 3

	public function test_if_character_has_a_max_attack_range()
	{
		$superman = new Character();
		$superlopez = new Character();
		
		$superman->setAttackRange(true);
		$superlopez->setAttackRange(false);
		
		$resultRanged = $superman->getAttackRange();
		$resultMelee = $superlopez->getAttackRange();
		
		$this->assertEquals(2, $resultMelee);
		$this->assertEquals(20, $resultRanged);
		
	}

	public function test_if_distance_affects_attacks()
	{
		$superman = new Character();
		$superlopez = new Character();
		
		$superman->setAttackRange(true);
		$superlopez->setAttackRange(false);

		$superman->setPosition(100);
		$superlopez->setPosition(30);

		$superman->attacks($superlopez, 200);
		$superlopez->attacks($superlopez, 200);
		
		$resultRanged = $superlopez->getHealth();
		$resultMelee = $superman->getHealth();
		$this->assertEquals(1000, $resultMelee);
		$this->assertEquals(800, $resultRanged);
		
	}

	//Iteration 4

	public function test_if_characters_can_belong_to_factions()
	{
		$mrSamsa = new Character();
		$faction1 = new Faction('blue');
		$faction2 = new Faction('red');
		$mrSamsa->factionAffiliate($faction1);
		$mrSamsa->factionAffiliate($faction2);

		$result = $mrSamsa->getFactionNames();

		$this->assertContains('red', $result);
		$this->assertContains('blue', $result);

	}	

	public function test_if_character_belongs_no_faction_when_created() {

		$mrSamsa = new Character();
		$factionRed = new Faction('red');

		$result = $mrSamsa->getFactionNames();

		$this->assertEquals($result, []);
	}

	public function test_if_character_can_join_one_or_more_factions() {
		$mrSamsa = new Character();
		$factionRed = new Faction('factionRed');
		$factionBlue = new Faction ('factionBlue');

		$mrSamsa->factionAffiliate($factionRed);
		$mrSamsa->factionAffiliate($factionBlue);

		$result = $mrSamsa->getFactionNames();

		$this->assertContains('factionRed', $result);
		$this->assertContains('factionBlue', $result);
	}


	public function test_if_character_can_leave_one_or_more_factions() {
		$mrSamsa = new Character();
		$factionRed = new Faction('factionRed');
		$factionBlue = new Faction ('factionBlue');

		$mrSamsa->factionAffiliate($factionRed);
		$mrSamsa->factionAffiliate($factionBlue);

		$result = $mrSamsa->getFactionNames();

		//print_r($result);

		$mrSamsa->factionRenegate($factionRed);
		$mrSamsa->factionRenegate($factionBlue);

		$result = $mrSamsa->getFactionNames();

		$this->assertEquals($result, []);
	}


	public function test_if_characters_belonging_to_same_faction_are_allies() {

		$mrSamsa = new Character();
		$gregor = new Character();
		$factionRed = new Faction('red');
		
		$mrSamsa->factionAffiliate($factionRed);
		$gregor->factionAffiliate($factionRed);

		$result = $mrSamsa->getCommonFactions($gregor);

		$this->assertNotEmpty($result);

	}

	public function test_if_allies_cannot_damage_each_other() {

		$mrSamsa = new Character();
		$gregor = new Character();
		$factionRed = new Faction('red');
		
		$mrSamsa->factionAffiliate($factionRed);
		$gregor->factionAffiliate($factionRed);

		$mrSamsa->attacks($gregor, 200);
		
		$result = $gregor->getHealth();

		$this->assertEquals($result, 1000);

	}

	public function test_if_allies_can_heal_each_other() {

		$mrSamsa = new Character();
		$gregor = new Character();
		$grete = new Character;
		$factionRed = new Faction('red');
		
		$gregor->factionAffiliate($factionRed);
		$grete->factionAffiliate($factionRed);

		$mrSamsa->attacks($gregor, 200);
		$result1 = $gregor->getHealth();
		
		
		$grete->heal($gregor, 200);
		$result2 = $gregor->getHealth();
		
		$this->assertEquals($result1, 800);
		$this->assertEquals($result2, 1000);

	}
}