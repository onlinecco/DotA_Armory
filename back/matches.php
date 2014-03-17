<?php
include("class/d2api.php");
include("class/db.php");
$d2 = new d2API("76561198047054082");
$box = new DB_class;

if(isset($_SESSION['isLogin'])&&$_SESSION['isLogin'] == 1)
{
	echo "Your recent games:<br>";

	$result = $d2->getMatches($_SESSION['steamid']);

	$type = array (
		'-1' => 'INVALID',
		'0' => 'CASUAL_MATCH',
		'1' => 'PRACTICE',
		'2' => 'TOURNAMENT',
		'4' => 'COOP_BOT_MATCH',
		'5' => 'TEAM MATCH',
		'6' => 'SOLO_QUEUE_MATCH',
		'7' => 'COMPETITIVE_MATCH',

	);

	$nonesense = "<td>level</td><td>items</td><td>kills</td><td>deaths</td><td>assits</td><td>last hits</td><td>denies</td><td>GPM</td><td>EXPM</td>"; 

	if(is_array($result))
	{
	foreach($result as $element)
	{
		$matchid = $element["match_id"];
		$lobbytype = $element["lobby_type"];
		$i = 0;
	
		echo "<a href=\"http://dotabuff.com/matches/" . $matchid . "\"><table><tr><td>Match ID: $matchid</td>";
		echo "<td>Lobby Type: $type[$lobbytype]</td></tr></table>";
		$accountid = $player["account_id"];
		echo "<table><tr>";

		foreach($element["players"] as $player)
		{
			$accountid = $player["account_id"];

			$heroid = $player["hero_id"];

			$box->Get("Heroes","","WHERE HID = " . $heroid);
			$hey = $box->fetch_array();	
			echo "<td><img src=\"http://media.steampowered.com/apps/dota2/images/heroes/" . $hey[2] ."_eg.png\"></img></td>";
			if($i == 4) echo "<td><span>VS</span></td>";
			$i = $i + 1;
		}
		echo "</tr></table></a>";
		echo "<br>";
	}
	}
	else print_r($result);
}
else
{
	echo "<h1>You need to login first.</h1>";

}
?>
