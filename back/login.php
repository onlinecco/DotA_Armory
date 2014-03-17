<?php
include("class/db.php");

$box = new DB_class;
// define variables and set to empty values
$pwErr=$unErr=$logininfo=  "";
$password=$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	if (empty($_POST["username"]))
    	{
		$unErr = "Username is required";
	}
  	else
    	{
		$username = test_input($_POST["username"]);
		if (!preg_match("/^[a-zA-Z0-9]*$/",$username))
  		{
  			$unErr = "Only letters and numbers allowed"; 
 		}
	}

  	if (empty($_POST["password"]))
    	{
		$pwErr = "Password is required";
	}
  	else
    	{
		$password = test_input($_POST["password"]);
		if (!preg_match("/^[a-zA-Z0-9]*$/",$password))
  		{
  			$pwErr = "Only letters and numbers allowed"; 
  		}
	}

	if($unErr == "" && $pwErr == "")
	{
		$pass = $box->Get("Users","`Password`,`SteamID`","WHERE `username`= '" . $username . "' LIMIT 1");
		if($pass == FALSE)
			$logininfo = "The username does not exist.";
		else
		{	
			$pass = $box->fetch_array();
			$passp = $pass['Password'];
		}
		if($passp == $password)
		{
			$_SESSION['username'] = $username;
			$_SESSION['isLogin'] = 1;
			$_SESSION['steamid'] = $pass['SteamID'];
			$logininfo = "You have succesfully logged in.";
		}
		else $logininfo =  "password is wrong";
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
