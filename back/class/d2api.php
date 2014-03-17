<?php

        

define("API_KEY","9FCDE5B7BC2797BCE4F68F7892AB26E8");
class d2API
{
	private $id = "76561198047054082";

	public function __construct($uid = "76561198047054082")
	{
		$this->id = $uid;
	}

	public function request($url)
	{
	        $ch = curl_init();


        	curl_setopt($ch, CURLOPT_URL, $url);
        	curl_setopt($ch, CURLOPT_ENCODING , "gzip");
        	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        	// Ignore SSL warnings and questions
        	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        	$r = curl_exec($ch);
        	curl_close($ch);
		$result = json_decode($r,true);
		if(is_array($result)) return $result;
		else return $r;	
	}

	public function getHeroList()
	{
		
		$url = "https://api.steampowered.com/IEconDOTA2_570/GetHeroes/v0001/?key=9FCDE5B7BC2797BCE4F68F7892AB26E8&language=en_us";

		$r = $this->request($url);
		$r = $r["result"];
		$r = $r["heroes"];

		/*	
        	foreach($r as $element)
        	{
                	printf("id: %s,<br>name: %s,<br>",$element["id"],$element["localized_name"]);
		}
	*/
		return $r;
	}

	public function getMatches($id)
	{
		$url = "https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?key=9FCDE5B7BC2797BCE4F68F7892AB26E8&account_id=" . $id;
		$r = $this->request($url);
		if(is_array($r))
		{
			$r = $r['result'];
			$r = $r['matches'];
		}
		return $r;
	}
	
	public function getPlayerInfo($id)
	{
		$url = "http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=9FCDE5B7BC2797BCE4F68F7892AB26E8&steamids=" . $id;

		$r = $this->request($url);
		$r = $r['response'];
		$r = $r['players'];
		$r = $r[0];
		return $r;
	}
}
?>
