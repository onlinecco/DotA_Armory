<?php
require "class/openid.php";
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('engr-cpanel-mysql.engr.illinois.edu');
    if(!$openid->mode) {
            $openid->identity = "http://steamcommunity.com/openid";
            # The following two lines request email, full name, and a nickname
            # from the provider. Remove them if you don't need that data.
           // $openid->required = array('contact/email');
            //$openid->optional = array('namePerson', 'namePerson/friendly');
            header('Location: ' . $openid->authUrl());
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        echo 'User ' . ($openid->validate() ? $openid->identity . ' has ' : 'has not ') . 'logged in.';
	print_r($openid->getAttributes());
    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
