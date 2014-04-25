<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include_once "../back/class/db.php";?>

<?php
$d2 = new d2api;
$box = new DB_class;

$data = array();
$box->Get("Recommend","","WHERE `Steamid`='" . $_SESSION['steamid']."'");
if($row = $box->fetch_array())
{

        $data[0] = $row['Hero0'];
        $data[1] = $row['Hero1'];
        $data[2] = $row['Hero2'];
	

}
else echo json_encode(array("No record"));
for ($i = 0; $i < 3; $i++){
	$box->Get("Heroes","","WHERE `HID`='".$data[$i]."'");
	if($row = $box->fetch_array()){
		$data[$i] = $row['Hname'];
		$data[$i+3] = $row['Hnameserver'];
	}
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
