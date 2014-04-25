<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<?php
$d2 = new d2api;
$box = new DB_class;
$data= array();

$box2 = new DB_class;
$box->Get("Users","","WHERE 1");

$str = array( 2, 7, 14, 16, 18, 19, 23, 28, 29, 38, 42, 49, 51, 54, 57, 59, 69, 71, 73, 77, 78, 81, 83, 85, 91, 96, 97, 98, 99, 100, 102, 103, 104, 107, 110);

$agi = array ( 80, 1, 4, 6, 8, 9, 10, 11, 12, 15, 20, 32, 35, 40, 41, 44, 46, 47, 48, 56, 60, 61, 62, 63, 67, 70, 72, 82, 86, 88, 89, 93, 94, 95, 106, 109);

$int = array ( 34, 65, 68, 3, 5, 13, 17, 21, 22, 25, 26, 27, 30, 31, 33, 36, 37, 39, 43, 45, 50, 52, 53, 55, 58, 64, 66, 74, 75, 76, 79, 84, 87, 90, 92, 101);

//0 is steamid, 1 is the data, 2 is the heroid, 3 is 
while($row = $box->fetch_array())
{
	$p = array();
        $result = $d2->getPlayerInfo($row['SteamID']);

        $p[0] = $result['personaname'];
       	$p[1] = $result['avatarmedium'];
       	$p[2] = $row['SteamID'];
      	array_push($data,$p);
	
        	

			$coords = array();	
               $result = $d2->getMatches($row['SteamID']);


        	if(is_array($result))
        	{
			$curTime = time() - 3600*24;
			$lastday = 0;

			
			  //loop through each MATCH!!!!!!
        		foreach($result as $element)
        		{
				echo $element['match_id'];
				$detail = $d2->getMatchDetail($element['match_id']);
				if($detail['start_time'] < $curTime){
					
					                                        $o = 1;
                                        while($detail['start_time'] < $curTime)
                                        {
                                                if($lastday>6) break;
                                                if($o) $o = 0;
                                                else $coords[$lastday]=0;
                                                $lastday = $lastday + 1;
                                                $curTime = $curTime - 3600*24;
                                        }
					$win = 0;
					$total = 0;
				}
			
				if($lastday>6) break;
				$total = $total +1;	
				$players = $element['players'];
				foreach($players as $player)
				{
       					$converted = '765'.($player['account_id'] + 61197960265728);
    
					if($converted == $row['SteamID'])
					{
						$hero = $player['hero_id'];
						$coords[$hero] = $coords[$hero] + 1;
						break;
					}
				}
				

        		}
        	}

		arsort($coords);
		reset($coords);
		$mostused = key($coords);
		$heroestorec = array();
		
		if (array_search($mostused, $str) != false) {
			$index = array_search($mostused, $str);
			do { 
				$heroestorec = array_rand($str, 3);
			} while (array_search ($index, $heroestorec) != false);
			foreach ($heroestorec as $key => $value){
				$heroestorec[$key] = $str[$value];
			}
		}
		else if (array_search($mostused, $agi) != false) {
			$index = array_search($mostused, $agi);
			do { 
				$heroestorec = array_rand($agi, 3);
			} while (array_search ($index, $heroestorec) != false);
			foreach ($heroestorec as $key => $value){
				$heroestorec[$key] = $str[$value];
			}
		}
		else {
			$index = array_search($mostused, $int);
			do { 
				$heroestorec = array_rand($int, 3);
			} while (array_search ($index, $heroestorec) != false);
			foreach ($heroestorec as $key => $value){
				$heroestorec[$key] = $str[$value];
			}
		}
		
		
		$box2->Get("Recommend","","WHERE `Steamid`='" . $row['SteamID'] . "'");
		$das = $row['SteamID'];
		if(!($row2 = $box2->fetch_array()))
		{
			//add
			$box2->Add("Recommend","`Steamid`,`Hero0`,`Hero1`,`Hero2`","'".$das."','".$heroestorec[0] ."','".$heroestorec[1]."','".$heroestorec[2]."'");

		}
		else
		{
			//set
			$box2->Set("Recommend","`Steamid`,`Hero0`,`Hero1`,`Hero2`","'".$das."','".$heroestorec[0] ."','".$heroestorec[1]."','".$heroestorec[2]."'","WHERE `Steamid`='".$das."'");
		}
		$box2->Set("Users","`lastupdate`='".time()."'","WHERE `SteamID`='".$das."'"); 
}



echo "finished!";
?>

