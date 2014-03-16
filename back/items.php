<?php

include("class/db.php");
$unErr =  "";
$test = new DB_class();                    
                                                    

  if (empty($_POST["name"])&&empty($_POST["Ides"]))
    {$unErr = "Input is required";}
  else{ if($_POST["name"]!="")
  	{$result = $test->Get("Items","","WHERE Iname  ='" . $_POST["name"] . "'"); 
while($row = $test->fetch_array())                                                                              
{
        printf("Item ID: %s,<br>Item: %s,<br>Price: %s,<br>Description: %s<br>",$row[0],$row[3],$row[1],$row[2]);
}    

}
	else 
{$result = $test->Get("Items","","WHERE Idescription  LIKE'%" . $_POST["Ides"] . "%'"); 
while($row = $test->fetch_array())                                                                              
{
        printf("Item ID: %s,<br>Item: %s,<br>Price: %s,<br>Description: %s<br>",$row[0],$row[3],$row[1],$row[2]);
}    


}
}                                                                       



?>
