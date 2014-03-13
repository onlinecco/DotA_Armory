<?php

include("class/db.php");
// define variables and set to empty values
$pwErr=$nameErr = $emailErr = $genderErr = $websiteErr = "";
$password=$name = $email = $gender = $comment = $website = "";
session_start();
$box = new DB_class;

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  if (empty($_POST["name"]))
  {
	$nameErr = "Name is required";
  }
  else
  {
	$name = test_input($_POST["name"]);
	if (!preg_match("/^[a-zA-Z0-9]*$/",$name))
  	{
  		$nameErr = "Only letters and numbers allowed"; 
  	}
	
  }

  if (empty($_POST["password"]))
    {$pwErr = "Password is required";}
  else
    {$password = test_input($_POST["password"]);
if (!preg_match("/^[a-zA-Z0-9]*$/",$password))
  {
  $pwErr = "Only letters and numbers allowed"; 
  }}

  if (empty($_POST["email"]))
    {$emailErr = "Email is required";}
  else
    {$email = test_input($_POST["email"]);
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
  {
  $emailErr = "Invalid email format"; 
  }

	if (!preg_match("#.*@illinois.edu$#i",$email))
	{
		$emailErr = "Must register using a UIUC email";
	}
}
  if (empty($_POST["steamid"]))
    {$website = "";}
  else
    {$website = test_input($_POST["steamid"]);
if (!preg_match("/^[0-9]*$/",$website))
  {
  $websiteErr = "Invalid SteamID"; 
  }
	}

if($pwErr== "" && $nameErr == "" && $emailErr == "" && $genderErr == "" && $websiteErr == "")
{
	$box->add("Users","`Username`,`Password`,`SteamID`,`Email`","'".$name."','".$password."','".$website."','".$email."'");

}

}


function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
