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

       echo "<br><br>";
        echo "<form action=\"\" method=\"post\"> ";
        $test->Get("Items","","WHERE Iname NOT LIKE 'recipe%' AND IID <> '0'");
        while($row = $test->fetch_array())
        {
        echo "<input style=\"margin:0 3px 0 0;display:inline-block;height:64px;margin-bottom:2px;width:85px;background-size:100%\" type=\"image\" src=\"http://cdn.dota2.com/apps/dota2/images/items/" . strtolower($row[3]) . "_lg.png \" value=\"" . $row[3] . "\" name=\"name\">";
        }
        echo "</form>";

?>
