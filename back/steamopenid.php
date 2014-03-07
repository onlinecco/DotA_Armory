<?php
require "class/openid.php";

$steamid= "000";

function connectsteam(){
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('dotaarmory.web.engr.illinois.edu/view/register.php');
    
	if(!$openid->mode) {
            $openid->identity = "http://steamcommunity.com/openid";
            # The following two lines request email, full name, and a nickname
            # from the provider. Remove them if you don't need that data.
           // $openid->required = array('contact/email');
            //$openid->optional = array('namePerson', 'namePerson/friendly');
	header('Access-Control-Allow-Origin: *');    
	header('Location: ' . $openid->authUrl());

	} elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        if($openid->validate())
	{
		 $steamid = $openid->identity;
$ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $steamid, $matches);		
echo $matches[1];

	}
	else echo 'login failed';
    }
}
	

?>
