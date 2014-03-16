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

<div class="text" align="center" height=800>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Item Name: <input type="text" name="name"><br>
<br>
Or select by Item type:
<br>

Defensive:
<input type="radio" checked="checked" name="Ides" value="Defensive" />
<br />
Offensive:
<input type="radio" name="Ides" value="Offensive" />
<br />
Basic:
<input type="radio" name="Ides" value="Basic" />
<br />
Secret:
<input type="radio" name="Ides" value="Secret" />
<br />
General:
<input type="radio" name="Ides" value="General" />
<br /><br>
<input type="submit" value="Search">
<br>
</form>
<?php echo $unErr ?>
<?php include("../back/items.php"); ?>


</div>                    
</div>                    
</div>
<?php include("footer.php");?>
</body>
</html>
