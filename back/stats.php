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
	if(abs($row['lastupdate'] - time()) > 3600*12 )
	{
        	$p = array();
        	$result = $d2->getPlayerInfo($row['SteamID']);

                	        $p[0] = $result['personaname'];
                        	$p[1] = $result['avatar'];
                        	$p[2] = $row['SteamID'];
                        	array_push($data,$p);

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
//					echo "winrate of day" . $lastday. "is:". $winrate ."<br>";
					$lastday = $lastday + 1;
					$curTime = $curTime - 3600*24;
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
 
	}
	//display
	{

	}
}

/*foreach($online as $content)
{
        echo "<div class=\"userpro\"><a href=\"steam://friends/add/".$content[2] ."\"> <img src=\"" . $content[1] ."\"></img></a>"  . $content[0] . "</div>";
}*/

$data[1]= $coords;

echo json_encode($data);
?>

