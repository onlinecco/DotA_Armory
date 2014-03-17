<?php
include("class/db.php");

$box = new DB_class;
// define variables and set to empty values
$emailErr=$opwErr=$pw2Err=$pwErr=$unErr=$profileinfo=  "";
$email=$opassword=$password2=$password=$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(!isset($_POST['delete'])){
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
	if (empty($_POST["email"]))
    	{
		$emailErr = "Email is required";
	}
	else
    	{
		$email = test_input($_POST["email"]);
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
  		{
  			$emailErr = "Invalid email format";
  		}

        	if (!preg_match("#.*@illinois.edu$#i",$email))
        	{
                	$emailErr = "Must register using a UIUC email";
        	}
	}

	if (empty($_POST["opassword"]))
    	{
		$opwErr = "Old Password is required";
	}
  	else
    	{
		$opassword = test_input($_POST["opassword"]);
		if (!preg_match("/^[a-zA-Z0-9]*$/",$opassword))
  		{
  			$opwErr = "Only letters and numbers allowed"; 
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

	if (empty($_POST["password2"]) || $_POST['password']!=$_POST['password2'])
    	{
		$pw2Err = "The passwords you entered are different";
	}
  	else
    	{
		$password2 = test_input($_POST["password2"]);
		if (!preg_match("/^[a-zA-Z0-9]*$/",$password2))
  		{
  			$pw2Err = "Only letters and numbers allowed"; 
  		}
	}

	if($opwErr == "" && $emailErr == "" &&$unErr == "" && $pwErr == "" && $pw2Err =="")
	{
		$pass = $box->Get("Users","`Password`,`SteamID`","WHERE `username`= '" . $_SESSION['username'] . "' LIMIT 1");
		if($pass == FALSE)
			$logininfo = "The username does not exist.";
		else
		{	
			$pass = $box->fetch_array();
			$passp = $pass['Password'];
		}
		if($passp == $opassword)
		{
			$query = $box->Set("Users","`Username`='" . $username ."',`Password`='" . $password. "',`Email`='" .$email ."'","WHERE `username`='" . $_SESSION['username']."'");
			if($query)
			{
				$_SESSION['username'] = $username;
				$profileinfo = "Profile has been updated.";
			}
			else $profileinfo = "Please try again later";
		}
		else $opwErr =  "Old password is wrong";
	}
	}
	else
	{
		$query = $box->Del("Users","`username`='" . $_SESSION['username']. "'");
		if($query)
		{ 
			$_SESSION['username'] = "";
			$_SESSION['isLogin'] = "";
			$_SESSION['steamid'] = "";
			$profileinfo = "Account has been deleted";	
		}
		else
			$profileinfo = "please try again later";
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
