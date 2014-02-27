<?php
// define variables and set to empty values
$pwErr=$nameErr = $emailErr = $genderErr = $websiteErr = "";
$password=$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  if (empty($_POST["name"]))
    {$nameErr = "Name is required";}
  else
    {$name = test_input($_POST["name"]);
if (!preg_match("/^[a-zA-Z ]*$/",$name))
  {
  $nameErr = "Only letters and white space allowed"; 
  }}

  if (empty($_POST["password"]))
    {$pwErr = "Password is required";}
  else
    {$password = test_input($_POST["password"]);
if (!preg_match("/^[a-zA-Z ]*$/",$password))
  {
  $pwErr = "Only letters and white space allowed"; 
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
  if (empty($_POST["comment"]))
    {$comment = "";}
  else
    {$comment = test_input($_POST["comment"]);}

  if (empty($_POST["gender"]))
    {$genderErr = "Gender is required";}
  else
    {$gender = test_input($_POST["gender"]);}
}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
