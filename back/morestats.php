<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include_once "../back/class/db.php";?>
<?php
$box = new DB_class;
$data = array();
$box->Get("`Stats`,`Heroes` h1,`Heroes` h2,`Heroes` h3,`Heroes` h4,`Heroes` h5","","WHERE `Steamid`='" . $_SESSION['steamid']."' AND mostgpmhero = h1.HID AND mostkillhero = h2.HID AND mostdeathhero = h3.HID AND mostassisthero = h4.HID AND longestgamehero = h5.HID");
if($row = $box->fetch_array())
{
	$row[2] = $row[14];
	$row[4] = $row[19];
	$row[6] = $row[24];
	$row[8] = $row[29];
	$row[10] = $row[34];
	
echo json_encode($row);
}

?>

