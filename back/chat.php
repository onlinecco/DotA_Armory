<?php include_once "../back/class/db.php";?>
<?php

$unErr =  "";
$test3 = new DB_class();  

           if (empty($_POST["name2"]))
           {
            $result = $test3->Get("Chat","","WHERE 1");
            while($row = $test3->fetch_array())                                                                              
            {
             printf("%s: %s<br>",$row[0],$row[1]);
            }    

            }
            else{ 
            if($_POST["name2"]!="")
            {$dt = time();
            $names = $_SESSION['username'];
             if(empty($name))
             $names = "anonymous";
            $test3->Add("Chat","`Message`,`Time`,`Username`","'".$_POST["name2"]."','".$dt."','".$names."'");

              $result = $test3->Get("Chat","","WHERE 1");
            while($row = $test3->fetch_array())                                                                              
            {
             printf("%s: %s<br>",$row[0],$row[1]);
            }
             }
            
            else{
             $result = $test3->Get("Chat","","WHERE 1");
            while($row = $test3->fetch_array())                                                                              
            {
             printf("%s: %s<br>",$row[0],$row[1]);
            }
            }
            }
?>
