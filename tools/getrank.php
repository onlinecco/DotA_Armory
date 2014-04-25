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
	flush();
       	echo "Player $p[0] in progress:<br>";
	$p[1] = $result['avatarmedium'];
       	$p[2] = $row['SteamID'];
      	array_push($data,$p);
	$rank = 0;
	
        	

			$coords = array();
		$result = $d2->getMatchesSkill($row['SteamID'],$skill);


			$flag1 = 1;
        	if(is_array($result))
        	{
			$curTime = time() - 3600*24;
			$lastday = 0;
			$win = 0;
			$total = 0;
        		foreach($result as $element)
        		{
				echo $element['match_id'];
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
				$flag1 = 0;
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
						if($detail['lobby_type']=='7')
						{
							$rank=$rank+4;
						}
						if($detail['lobby_type']=='0' || $detail['lobby_type']=='5' || $detail['lobby_type']=='6')
						{
							$rank=$rank+2;
						}	
					}
					else
					{
						//lose
						if($detail['lobby_type']=='7')
						{
							$rank=$rank-4;
						}
						if($detail['lobby_type']=='0' || $detail['lobby_type']=='5' || $detail['lobby_type']=='6')
						{
						  $rank=$rank-2;
						}
					}
				}
				else
				{
					if( $detail['radiant_win'] != 'false')
					{
						$win = $win+1;
						if($detail['lobby_type']=='7')
						{
						  $rank=$rank+4;
						}
						if($detail['lobby_type']=='0' || $detail['lobby_type']=='5' || $detail['lobby_type']=='6')
						{
						  $rank=$rank+2;
						}
					
					}
					else
					{
						//lose
						if($detail['lobby_type']=='7')
						{
						$rank=$rank-4;
						}
						if($detail['lobby_type']=='0' || $detail['lobby_type']=='5' || $detail['lobby_type']=='6')
						{
						 $rank=$rank-2;
						}
					}
				}
        		}
			
		}
		if($flag1) $rank = -999;
		$box2->Get("Users","","WHERE `Steamid`='" . $row['SteamID'] . "'");
		$das = $row['SteamID'];
		$box2->Set("Users","`Rank`='". $rank ."'","WHERE `Steamid`='".$das."'");

		
}



echo "finished!";
?>

