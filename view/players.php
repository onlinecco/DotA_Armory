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
$online = array();
$box->Get("Users","SteamID","");
while($row = $box->fetch_array())
{
	$p = array();
	$result = $d2->getPlayerInfo($row['SteamID']);

	if(isset($result['gameid']) && $result['gameid'] == '570')
	{
		echo "<div class=\"userpro\"><img src=\"" . $result["avatar"]."\"></img>" . $result['personaname']."</div>";
	}
	else
	{
		if( !isset($result['gameid']) && $result['personastate'] == '1')
		{
			$p[0] = $result['personaname'];
			$p[1] = $result['avatar'];
			array_push($online,$p);
		}
	}
}

?>
<br>
Users currently online:
<br>
<?php
foreach($online as $content)
{
	echo "<div class=\"userpro\"><img src=\"" . $content[1] ."\"></img>"  . $content[0] . "</div>";
}
?>
</div>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
