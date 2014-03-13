<?php include("../back/core.php");?>
<?php include("../back/login.php"); ?>
<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
<?php include("header.php");?>
					<div class="body">
<div class="content">
<div class="text">
<?php 
if($logininfo == "")
{
	if($_SESSION['isLogin']) echo "You have already Logged in";
	else include("logininfo.php");
}
else echo $logininfo;
?>                
</div>    </div>
</div>
<?php include("footer.php");?>


</body>
</html>
