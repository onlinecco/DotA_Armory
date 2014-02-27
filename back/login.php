<?php
// define variables and set to empty values
$pwErr=$unErr =  "";
$password=$username = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  if (empty($_POST["username"]))
    {$unErr = "Username is required";}
  else
    {$username = test_input($_POST["username"]);
if (!preg_match("/^[a-zA-Z ]*$/",$username))
  {
  $unErr = "Only letters and white space allowed"; 
  }}

  if (empty($_POST["password"]))
    {$pwErr = "Password is required";}
  else
    {$password = test_input($_POST["password"]);
if (!preg_match("/^[a-zA-Z ]*$/",$password))
  {
  $pwErr = "Only letters and white space allowed"; 
  }}


}
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
