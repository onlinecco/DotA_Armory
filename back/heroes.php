<?php
include("class/db.php");
$unErr =  "";
$test = new DB_class();                    
                                                    
 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"]))
    	{
		$unErr = "Hero name is required";
	}
  	else
	{
		$result = $test->Get("Heroes","","WHERE Hname  ='" . $_POST["name"] . "'");
		while($row = $test->fetch_array())                                                                              
		{
        		printf("Hero ID: %s,<br>Hero: %s,<br>Type: %s,<br>Description: %s,<br>",$row[0],$row[1],$row[3],$row[4]);
			echo "<img src=\"http://media.steampowered.com/apps/dota2/images/heroes/" . strtolower($row[2]) . "_lg.png \"></img>";
		}
	}
}                                                                                                 


?>
