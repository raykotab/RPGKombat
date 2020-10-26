<?php

namespace Tests;

use  PHPUnit\Framework\TestCase;
use App\Character;

class CharacterTest extends TestCase {

	

	public function test_if_Health_starts_1000(
	) {
		/*$character = new Character();
		$result = $character->health;*/

		//escenario - given
		$sonGoku = new Character();
		//accion - when

		//assert - then
		$result = $sonGoku->getHealth();

		$this->assertEquals(1000, $result);
	}

	public function test_Level_starting_at_1()
	{
		$sonGoku = new Character();

		$result = $sonGoku->getLevel();

		$this->assertEquals(1, $result);
	}
	
	public function test_if_aliva()
	{
		$sonGoku = new Character();

		$result = $sonGoku->isAlive();

		$this->assertEquals(true, $result);
	}

	public function test_damage_is_substracted_from_health()
	{//escenario
		$attacker = new Character();
		$damaged = new Character();

		//action

		$attacker->attack($damaged);

		//then
		$result = $damaged->getHealth();

		$this->assertEquals(900, $result);
	}
	

	
		
}


