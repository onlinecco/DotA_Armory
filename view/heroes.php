<?php include("../back/core.php");?>
<html> 
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
<?php include("header.php"); ?>
<div class="body" height=800>
<div class="content" height=800>

<div class="text" height=800>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Hero Name: <input type="text" name="name"><br>
<input type="submit">
<br>
<?php include("../back/heroes.php"); ?>
<?php echo $unErr ?>
</div>
</div>
</div>
<?php include("footer.php");?> 
</body>
</html>
