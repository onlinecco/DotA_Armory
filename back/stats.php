<?php include("../back/core.php");?>
<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<?php
$d2 = new d2api;
$box = new DB_class;
$data= array();
$coords = array();

$box->Get("Users","","WHERE `Username`='" . $_SESSION['username']."'");
if($row = $box->fetch_array())
{
	$p = array();
        $result = $d2->getPlayerInfo($row['SteamID']);

        $p[0] = $result['personaname'];
       	$p[1] = $result['avatarmedium'];
       	$p[2] = $row['SteamID'];
      	array_push($data,$p);

	if(abs($row['lastupdate'] - time()) > 3600*12 )
	{
        	

               $result = $d2->getMatches($_SESSION['steamid']);

        	$nonesense = "<td>level</td><td>items</td><td>kills</td><td>deaths</td><td>assits</td><td>last hits</td><td>denies</td><td>GPM</td><td>EXPM</td>";

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
		//			echo "winrate of day" . $lastday. "is:". $winrate ."<br>";
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
    
					if($converted == $_SESSION['steamid'])
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
		//check if it exists
		//yes-> set
		//no-> add	
		$box->Get("Winrate","","WHERE `Steamid`='" . $_SESSION['steamid'] . "'");
		if(!($row = $box->fetch_array()))
		{
			//add
			$box->Add("Winrate","`Steamid`,`day0`,`day1`,`day2`,`day3`,`day4`,`day5`,`day6`","'".$_SESSION['steamid']."','".$coords[0] ."','".$coords[1]."','".$coords[2]."','".$coords[3]."','".$coords[4]."','".$coords[5]."','".$coords[6]."'");

		}
		else
		{
			//set
			$box->Set("Winrate","`day0`='" .$coords[0]."',`day1`='".$coords[1] ."',`day2`='".$coords[2]."',`day3`='".$coords[3]."',`day4`='".$coords[4]."',`day5`='".$coords[5]."',`day6`='".$coords[6]."'","WHERE `Steamid`='".$_SESSION['steamid']."'");
		}
		$box->Set("Users","`lastupdate`='".time()."'","WHERE `SteamID`='".$_SESSION['steamid']."'"); 
	}
	else
	{
		$box->Get("Winrate","","WHERE `Steamid`='" . $_SESSION['steamid']."'");
		if($row = $box->fetch_array())
		{
			array_push($coords,$row['day0']);
			array_push($coords,$row['day1']);
			array_push($coords,$row['day2']);
			array_push($coords,$row['day3']);
			array_push($coords,$row['day4']);
			array_push($coords,$row['day5']);
			array_push($coords,$row['day6']);
		}
	}
}

/*foreach($online as $content)
{
        echo "<div class=\"userpro\"><a href=\"steam://friends/add/".$content[2] ."\"> <img src=\"" . $content[1] ."\"></img></a>"  . $content[0] . "</div>";
}*/

$data[1]= $coords;

echo json_encode($data);
?>

