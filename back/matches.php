<?php
include("class/d2api.php");

$d2 = new d2API("76561198047054082");

$result = $d2->getMatches();

//$result = $d2->getHeroList();

//	print_r($element)
foreach($result as $element)
{
	$matchid = $element["match_id"];
	$lobbytype = $element["lobby_type"];
	echo "Match ID: $matchid<br>";
	echo "Lobby Type: $lobbytype<br>";
	$i = 0;
	foreach($element["players"] as $player)
	{
		$accountid = $player["account_id"];
		$playerslot = $player["player_slot"];
		$heroid = $player["hero_id"];

		echo "Player $i ID: $accountid<br>";
		
		echo "Player $i slot: $playerslot<br>";
		
		echo "Hero $i ID: $heroid<br>";

		$i = $i + 1;
	}
	echo "<br>";
}

?>
