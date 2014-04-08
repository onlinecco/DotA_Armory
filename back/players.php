<?php include("../back/class/d2api.php");?>
<?php include("../back/class/db.php");?>
<?php
$d2 = new d2api;
$box = new DB_class;
$online = array();
$ingame = array();
$box->Get("Users","SteamID","");

while($row = $box->fetch_array())
{
        $p = array();
        $result = $d2->getPlayerInfo($row['SteamID']);

        if(isset($result['gameid']) && $result['gameid'] == '570')
        {
                        $p[0] = $result['personaname'];
                        $p[1] = $result['avatar'];
                        $p[2] = $row['SteamID'];
                        array_push($ingame,$p);

//                echo "<div class=\"userpro\"><a href=\"steam://friends/add/".$row['SteamID'] ."\"><img src=\"" . $result["avatar"]."\"></img></a>" . $result['personaname']."</div>";
        }
        else
        {
                if( $result['personastate'] != '0')
                {
                        $p[0] = $result['personaname'];
                        $p[1] = $result['avatar'];
                        $p[2] = $row['SteamID'];
                        array_push($online,$p);
                }
        }
}

/*foreach($online as $content)
{
        echo "<div class=\"userpro\"><a href=\"steam://friends/add/".$content[2] ."\"> <img src=\"" . $content[1] ."\"></img></a>"  . $content[0] . "</div>";
}*/

$result = array();
$result[0]=$ingame;
$result[1]=$online;

echo json_encode($result);
?>

