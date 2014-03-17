<?php include("../back/core.php");?>
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
<?php if(isset($_SESSION['isLogin'])&&$_SESSION['isLogin']==1)
	{
		
		include('../back/profile.php');
		if(empty($profileinfo))
		{
			include('profileinfo.php');
		}
		else
		{
			echo $profileinfo;
		}	
	}
	else
	{
		echo "You need to login first.";
	}
?>
</div>                    
</div>                    
</div>
<?php include("footer.php");?>
</body>
</html>
