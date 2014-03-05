<?php

include("class/d2api.php");

$d2 = new d2API();

$result = $d2->getMathces();

foreach($result as $label => $element)
{
	
	echo "Match ID: $element["match_id"]<br>";
	echo "Lobby Type: $element["lobby_type"]<br>";
	$i = 0;
	foreach($element["players"] as $player)
	{
		echo "Player . $i . ID: $player["account_id"]<br>";
		
		echo "Player . $i . ID: $player["player_slot"]<br>";
		
		echo "Player . $i . ID: $player["hero_id"]<br>";

		$i = $i + 1;
	}
}


?>
