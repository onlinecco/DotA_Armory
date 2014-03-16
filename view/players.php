<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
<?php include("header.php");?>
<div class="body">
<div class="content">
<div class="text">

Users currently in game:
<br>
<?php 
$d2 = new d2api;
$box = new DB_class;

$box->Get("Users","SteamID","");
while($row = $box->fetch_array())
{
	$result = $d2->getPlayerInfo($row['SteamID']);

	if(isset($result['gameid']) && $result['gameid'] == '570')
	{
		echo "<div class=\"userpro\"><img src=\"" . $result["avatar"]."\"></img>" . $result['personaname']."</div>";
	}
}

?>
<br>
Users currently online:
<br>
<?php
$box->Get("Users","SteamID","");
while($row = $box->fetch_array())
{
	$result = $d2->getPlayerInfo($row['SteamID']);

	if(!isset($result['gameid']) && $result['personastate'] == '1')
	{
		echo "<div class=\"userpro\"><img src=\"" . $result["avatar"]."\"></img>"  . $result['personaname']. "</div>";
	}
}
?>
</div>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
