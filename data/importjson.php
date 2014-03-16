<?php
include("back/class/db.php");

$test = new DB_class;

$heroes = file_get_contents("data/skills.json");

$heroes = json_decode($heroes,true);

$heroes = $heroes["abilities"];

foreach($heroes as $hero){

	$test->add("Skills","SID,Sname", "'" . $hero["id"] . "','" .$hero["name"]."'");

}

?>
