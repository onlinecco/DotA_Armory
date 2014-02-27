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
<table align="center">
<form style="padding: 0px 0px 0px 0px;margin:0px;border: dashed 1px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<tr align="left"><td>Username:</td><td> <input size=42 type="text" name="username">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $unErr;?></span></td></tr>
<br><br>
<tr align="left"><td>Password:</td>
<td><input size=42 type="password" name="password">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $pwErr;?></span></td></tr>
<br><br>

<br><br><tr align="left"><td>
<input type="submit" name="submit" value="Submit"> </td></tr>
</form>
</table>
                </div>    </div>
</div>
<?php include("footer.php");?>


</body>
</html>
