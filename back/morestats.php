<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include_once "../back/class/db.php";?>
<?php
$box = new DB_class;
$data = array();
$box->Get("Stats","","WHERE `Steamid`='" . $_SESSION['steamid']."'");
if($row = $box->fetch_array())
{
	$box2 = new DB_class;
	$box2->Get("Heroes","","WHERE `HID`='" .$row[2]."'");
	$second = $box2->fetch_array();
	$row[2] = $second['Hnameserver'];
	$box2->Get("Heroes","","WHERE `HID`='" .$row[4]."'");
	$second = $box2->fetch_array();
	$row[4] = $second['Hnameserver'];
	$box2->Get("Heroes","","WHERE `HID`='" .$row[6]."'");
	$second = $box2->fetch_array();
	$row[6] = $second['Hnameserver'];
	$box2->Get("Heroes","","WHERE `HID`='" .$row[8]."'");
	$second = $box2->fetch_array();
	$row[8] = $second['Hnameserver'];
	$box2->Get("Heroes","","WHERE `HID`='" .$row[10]."'");
	$second = $box2->fetch_array();
	$row[10] = $second['Hnameserver'];
	
echo json_encode($row);
}

?>

