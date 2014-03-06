<?php

include("class/db.php");
$unErr =  "";
$test = new DB_class();                    
                                                    
$result = $test->Get("Heroes","","WHERE Hname  ='" . $_GET["name"] . "'"); 
  if (empty($_GET["name"]))
    {$unErr = "Hero name is required";}
  else{
while($row = $test->fetch_array())                                                                              
{
        printf("Hero ID: %s,<br>Hero: %s,<br>Type: %s,<br>Description: %s,<br>",$row[0],$row[1],$row[2],$row[3]);
}    }                                                                                                 


?>
