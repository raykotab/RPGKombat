<?php 

namespace App;

use App\Faction;

interface IFaction
{

   public function factionAffiliate(Faction $faction);

   public function factionRenegate(Faction $faction);
   
}