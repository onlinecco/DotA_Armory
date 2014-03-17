<?php include("../back/core.php");?>
<html> 
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script language="javascript" type="text/javascript">
  function resizeIframe(obj) {
	var weq= document.getElementById('haha');
    obj.style.height = weq.contentWindow.document.body.scrollHeight + 'px';
  }
</script>
</head>
<body>
<?php include("header.php"); ?>
<div class="body" height=800>
<div class="content" height=800>

<div class="text" align="center" height=800>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
Hero Name: <input type="text" name="name"><br>
<br>
Or select by Hero type:
<br>
Strength:
<input type="radio" checked="checked" name="Type" value="Strength" />
<br />
Agility:
<input type="radio" name="Type" value="Agility" />
<br />
Intelligence:
<input type="radio" name="Type" value="Intelligence" />
<br /><br>
<input type="submit" value="Search">
<br>
</form>
<?php echo $unErr ?>
<?php include("../back/heroes.php"); ?>
</div>
</div>
</div>
</div>
<?php include("footer.php");?> 
</body>
</html>
