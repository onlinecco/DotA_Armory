<?php

        

class d2API
{
	define("API_KEY","9FCDE5B7BC2797BCE4F68F7892AB26E8");
	$id = "43394177";

	public function __construct($uid = "43394177")
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
        	$r = json_decode($ri,true);
		
		return $r;	
	}

	public function getHeroList()
	{
		
		$url = "https://api.steampowered.com/IEconDOTA2_570/GetHeroes/v0001/?key=9FCDE5B7BC2797BCE4F68F7892AB26E8&language=en_us";

		$r = $this->request($url);
		$r = ($r["result"])["heroes"];

		return $r;
	/*	
        	foreach($r as $ename => $element)
        	{
                	printf("id: %s,<br>name: %s,<br>",$element['id'],$element->['localized_name']);
		}
	*/
	}

	public function getMatch()
	{
		$url = "https://api.steampowered.com/IDOTA2Match_570/GetMatchHistory/V001/?key=<key>&account_id=" . $this->id;
		$r = $this->request($url);
		$r = $r['matches'];
		return $r;
	}

}
?>
