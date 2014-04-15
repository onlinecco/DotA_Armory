<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<?php
$d2 = new d2api;
$box = new DB_class;

$data = array();

$box->Get("`Users`,`Winrate`","","WHERE Winrate.Steamid = Users.SteamID");
while($row = $box->fetch_array())
{
	$user = array();
	$averagewinrate= ($row['day0'] +  $row['day1'] + $row['day2'] + $row['day3'] + $row['day4'] + $row['day5'] + $row['day6'] )/7; 	
        $result = $d2->getPlayerInfo($row['SteamID']);

        $user[0] = $result['personaname'];
        $user[1] = $result['avatar'];
        $user[2] = $row['SteamID'];
	$user[3] = $averagewinrate;

        array_push($data,$user);	

}

function cmp($a, $b) {
    if ($a[3] == $b[3]) {
        return 0;
    }
    return ($a[3] < $b[3]) ? -1 : 1;
}

uasort($data, 'cmp');
$dsa = array();
foreach($data as $d)
{
	array_push($dsa,$d);
}
echo json_encode($dsa);
?>
