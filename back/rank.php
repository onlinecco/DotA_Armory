<?php include("../back/class/d2api.php");?>
<?php include_once "../back/class/db.php";?>

<?php
$d2 = new d2api;
$box = new DB_class;

$data = array();

$box->Get("`Users`","","ORDER BY Rank");
while($row = $box->fetch_array())
{
	$user = array();
        $result = $d2->getPlayerInfo($row['SteamID']);

        $user[0] = $result['personaname'];
        $user[1] = $result['avatar'];
        $user[2] = $row['SteamID'];
	$user[3] = $row['Rank'];

        array_push($data,$user);	

}

function cmp($a, $b) {
    if ($a[3] == $b[3]) {
        return 0;
    }
    return ($a[3] < $b[3]) ? -1 : 1;
}

//uasort($data, 'cmp');
$dsa = array();
foreach($data as $d)
{
	array_push($dsa,$d);
}
echo json_encode($dsa);
?>
