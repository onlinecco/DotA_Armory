<?php
include("class/db.php");
$unErr =  "";
$test = new DB_class();                    
                                                    
 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST["name"])&&empty($_POST["Type"]))
    	{
		$unErr = "Input is required";
	}
  	else
	{ 
		if($_POST["name"]!="")
		{
			$result = $test->Get("Heroes","","WHERE Hname  ='" . $_POST["name"] . "'");
			while($row = $test->fetch_array())                                                                              
			{
        			printf("<table><tr class=\"heropro\"><td>Hero ID: %s,<br> Hero: %s,<br> Type: %s,<br>Description: %s,<br></td>",$row[0],$row[1],$row[3],$row[4]);
				echo "<td><img src=\"http://cdn.dota2.com/apps/dota2/images/heroes/" . strtolower($row[2]) . "_vert.jpg \"></img></td></tr></table>";
			}
		}
  		else
  		{
  			$result = $test->Get("Heroes","","WHERE Type  ='" . $_POST["Type"] . "'"); 
  			echo "<table>";
			while($row = $test->fetch_array())                                                                              
			{
        			printf("<tr class=\"heropro\"><td>Hero ID: %s,<br> Hero: %s,<br> Type: %s,<br>Description: %s,<br></td>",$row[0],$row[1],$row[3],$row[4]);
				echo "<td><img src=\"http://cdn.dota2.com/apps/dota2/images/heroes/" . strtolower($row[2]) . "_vert.jpg \"></img><br><br></td></tr>";
			}
			echo "</table>";

  		}
	}
       
}         
//else{
	
	echo "<br><br>";
	echo "<form action=\"\" method=\"post\"> ";
	$test->Get("Heroes","","");
	while($row = $test->fetch_array())
	{
	echo "<input style=\"margin:0 3px 0 0;display:inline-block;height:65.1685px;margin-bottom:2px;width:116.89498px;background-size:100%\" type=\"image\" src=\"http://media.steampowered.com/apps/dota2/images/heroes/" . strtolower($row[2]) . "_lg.png \" value=\"" . $row[1] . "\" name=\"name\">";
	}
	echo "</form>";
//}                                                                                        


?>
