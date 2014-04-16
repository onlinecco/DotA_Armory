<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<?php
$d2 = new d2api;
$box = new DB_class;
$data= array();

$box2 = new DB_class;
$box->Get("Users","","WHERE 1");
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
			$win = 0;
			$total = 0;
        		foreach($result as $element)
        		{
                		$detail = $d2->getMatchDetail($element['match_id']);
				if($detail['start_time'] < $curTime){
					if($total == 0) $winrate = 0;
					else $winrate = $win/$total;
					$coords[$lastday]=$winrate;
			//		echo "winrate of day" . $lastday. "is:". $winrate ."<br>";
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
						$playerslot = $player['player_slot'];
						break;
					}
				}
				
				if($playerslot < 5)
				{
					if( $detail['radiant_win'] == 'false')
					{
						$win = $win+1;
					}
				}
				else
				{
					if( $detail['radiant_win'] != 'false')
					{
						$win = $win+1;

					
					}
				}
        		}
        	}
		
		$box2->Get("Winrate","","WHERE `Steamid`='" . $row['SteamID'] . "'");
		$das = $row['SteamID'];
		if(!($row2 = $box2->fetch_array()))
		{
			//add
			$box2->Add("Winrate","`Steamid`,`day0`,`day1`,`day2`,`day3`,`day4`,`day5`,`day6`","'".$das."','".$coords[0] ."','".$coords[1]."','".$coords[2]."','".$coords[3]."','".$coords[4]."','".$coords[5]."','".$coords[6]."'");

		}
		else
		{
			//set
			$box2->Set("Winrate","`day0`='" .$coords[0]."',`day1`='".$coords[1] ."',`day2`='".$coords[2]."',`day3`='".$coords[3]."',`day4`='".$coords[4]."',`day5`='".$coords[5]."',`day6`='".$coords[6]."'","WHERE `Steamid`='".$das."'");
		}
		$box2->Set("Users","`lastupdate`='".time()."'","WHERE `SteamID`='".$das."'"); 
}



echo "finished!";
?>

