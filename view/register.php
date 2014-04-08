<?php 
include("../back/core.php");
include("../back/register.php");
require '../back/class/openid.php';
try {
    # Change 'localhost' to your domain name.
    $openid = new LightOpenID('http://dotaarmory.web.engr.illinois.edu/view/register.php');
    if(!$openid->mode) {
        if(isset($_POST['login'])) {
            $openid->identity = "http://steamcommunity.com/openid/?l=english";
            # The following two lines request email, full name, and a nickname
            # from the provider. Remove them if you don't need that data.
            header('Location: ' . $openid->authUrl());
        }
?>
<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script src="../css/jquery-1.11.0.min.js"></script>
</head>
<body>
<?php include("header.php");$steamid = "";?>
<div class="body">
<div class="content">
<div class="text">

<br><br><br>
<br><br><br>
<form  align="center" style="padding: 0;margin:0;" action="" method="post">
<input type="image" src="../images/steamlogin2.png" value="1" name="login">
</form>
<br>
<?php
    } elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
?>
<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script src="../css/jquery-1.11.0.min.js"></script>
</head>
<body>
<?php include("header.php");$steamid = "";?>
<div class="body">
<div class="content">
<div class="text">

<br><br><br>
<br><br><br>
<form align="center" action="" method="post">
<input type="image" src="../images/steamlogin2.png" value="1" name="login">
</form>
<br>
<?php
	if($openid->validate()){
$id = $openid->identity;	
   $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
		$steamid = $matches[1];
	} else echo fail;
	}
} catch(ErrorException $e) {
    echo $e->getMessage();
}
?>
<table  cellpadding="5" cellspacing="10" align="center">
<form style="padding: 0;margin:0;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<tr align="left"><td>Username:</td><td> <input size=42 type="text" name="name">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $nameErr;?></span></td></tr>

<tr align="left"><td>E-mail:</td>
<td><input size=42 type="text" name="email">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $emailErr;?></span></td></tr>

<tr><td></td><td>Only UIUC email addresses are allowed.</td></tr>
<tr align="left"><td>Password:</td>
<td><input size=42 type="password" name="password">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $pwErr;?></span></td></tr>

<tr align="left"><td>
SteamID:</td>
<td><input size=42 placeholder="Please sign in through Steam using the button at top." id="steamid" <?php if(!empty($steamid))echo "value = " . $steamid;?> type="text" readonly="readonly" name="steamid">*</td>
</tr><tr><td></td><td><span class="error"><?php echo $websiteErr;?></span></td>
</tr>
<tr><td></td><td>Please sign in through Steam using the button at top.</td></tr>
<tr align="left"><td>
<input type="submit" name="submit" value="Submit"> </td></tr>
</form>
</table>
<?php echo $registerinfo;?>
                 </div>   </div></div>

<?php include("footer.php");?>
</body>
</html>
