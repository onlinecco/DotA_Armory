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
You have successfully logged out.
<?php 
$_SESSION['isLogin'] = "";
$_SESSION['username'] = "";
$_SESSION['steamid'] = "";
?>
</div>                    
</div>                    
</div>
<?php include("footer.php");?>
</body>
</html>
