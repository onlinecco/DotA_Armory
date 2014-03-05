<?php
include("class/db.php");

$test = new DB_class();                                                                               
$result = $test->Get("Heroes","","");                                                                 
while($row = $test->fetch_array())                                                                              
{
        printf("Hero ID: %s,<br>Hero: %s,<br>Type: %s,<br>Description: %s,<br>",$row[0],$row[1],$row[2],$row[3]);
}                                                                                                     


?>
