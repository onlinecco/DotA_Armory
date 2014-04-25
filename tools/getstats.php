<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<?php
$d2 = new d2api;
$box = new DB_class;
$data= array();

$box2 = new DB_class;
$box->Get("Users","","WHERE 1");
//0 is steamid, 1 is the data, 2 is the heroid, 3 is 
while($row = $box->fetch_array())
{
	$p = array();
        $result = $d2->getPlayerInfo($row['SteamID']);

        $p[0] = $result['personaname'];
       	$p[1] = $result['avatarmedium'];
       	$p[2] = $row['SteamID'];
      	array_push($data,$p);
	$mostgpm = array();
$mostkill = array();
$mostassist = array();
$longestgame = array();
$totalgames = 0;
$mostdeath = array();

	
        	

			$coords = array();	
               $result = $d2->getMatches($row['SteamID']);


        	if(is_array($result))
        	{
			$curTime = time() - 3600*24;
			$lastday = 0;
        		foreach($result as $element)
        		{
				$detail = $d2->getMatchDetail($element['match_id']);
				
				if($detail['start_time'] < $curTime){
					                                        $o = 1;
                                        while($detail['start_time'] < $curTime)
                                        {
                                                if($lastday>6) break;
                                                if($o) $o = 0;
                                                $lastday = $lastday + 1;
                                                $curTime = $curTime - 3600*24;
                                        }
				}
			
				if($lastday>6) break;
				$totalgames = $totalgames + 1;				
				$players = $detail['players'];
				foreach($players as $player)
				{
					$converted = '765'.($player['account_id'] + 61197960265728);
    
					if($converted == $row['SteamID'])
					{
						if($player['kills'] >= $mostkill['data'])
						{
							$mostkill['steamid'] = $row['SteamID'];
							$mostkill['data'] = $player['kills'];
							$mostkill['hero_id'] = $player['hero_id'];
							
						}
						if($player['gold_per_min'] >= $mostgpm['data'])
						{
							$mostgpm['steamid'] = $row['SteamID'];
							$mostgpm['data'] = $player['gold_per_min'];
							$mostgpm['hero_id'] = $player['hero_id'];
							
						}if($player['assists'] >= $mostassist['data'])
						{
							$mostassist['steamid'] = $row['SteamID'];
							$mostassist['data'] = $player['assists'];
							$mostassist['hero_id'] = $player['hero_id'];
							
						}
						if($player['deaths'] >= $mostdeath['data'])
						{
							$mostdeath['steamid'] = $row['SteamID'];
							$mostdeath['data'] = $player['deaths'];
							$mostdeath['hero_id'] = $player['hero_id'];
							
						}
						if($detail['duration'] >= $longestgame['data'])
						{
							$longestgame['steamid'] = $row['SteamID'];
							$longestgame['data'] = $detail['duration'];
							$longestgame['hero_id'] = $player['hero_id'];
						
						}
						break;
					}
				}
				
				
					
					
				
        		}
        	}
		$box2->Get("Stats","","WHERE `Steamid`='" . $row['SteamID'] . "'");
		$das = $row['SteamID'];
		if(!($row2 = $box2->fetch_array()))
		{
			//add
			$box2->Add("Stats","`Steamid`,`mostgpm`,`mostgpmhero`,`mostkill`,`mostkillhero`,`mostassist`,`mostassisthero`,`mostdeath`,`mostdeathhero`,`longestgame`,`longestgamehero`,`totalgame`","'".$das."','".$mostgpm['data'] ."','".$mostgpm['hero_id']."','".$mostkill['data']."','".$mostkill['hero_id']."','".$mostassist['data']."','".$mostassist['hero_id']."','".$mostdeath['data']."','".$mostdeath['hero_id']."','".$longestgame['data']."','".$longestgame['hero_id']."','".$totalgames."'");
		}
		else
		{
			//set
			$box2->Set("Stats", "`Steamid`='".$das."',`mostgpm`='".$mostgpm['data']."',`mostgpmhero`='".$mostgpm['hero_id']."',`mostkill`='".$mostkill['data']."',`mostkillhero`='".$mostkill['hero_id']."',`mostassist`='".$mostassist['data']."',`mostassisthero`='".$mostassist['hero_id']."',`mostdeath`='".$mostdeath['data']. "',`mostdeathhero`='" . $mostdeath['hero_id']."',`longestgame`='".$longestgame['data']."',`longestgamehero`='".$longestgame['hero_id']."',`totalgame`='".$totalgames."'","WHERE `Steamid`='".$das."'");
		}
}



echo "finished!";
?>

