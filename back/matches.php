<?php

        $ch = curl_init();
       //echo $url;

$url = "https://api.steampowered.com/IEconDOTA2_570/GetHeroes/v0001/?key=9FCDE5B7BC2797BCE4F68F7892AB26E8&language=en_us"; 

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_ENCODING , "gzip");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // Ignore SSL warnings and questions
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $r = curl_exec($ch);
        curl_close($ch);
	$r = json_decode($r);
	$r = $r->{"result"};
	$r = $r->{"heroes"};
	foreach($r as $ename => $element)
	{
		printf("id: %s,<br>name: %s,<br>",$element->{'id'},$element->{'localized_name'});
	}



?>
