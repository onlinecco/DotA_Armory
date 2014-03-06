<?php include("../back/register.php"); ?>
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

<tr align="left"><td>Name:</td><td> <input size=42 type="text" name="name">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $nameErr;?></span></td></tr>
<br><br>
<tr align="left"><td>E-mail:</td>
<td><input size=42 type="text" name="email">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $emailErr;?></span></td></tr>
<br><br>
<tr align="left"><td>Password:</td>
<td><input size=42 type="password" name="password">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $pwErr;?></span></td></tr>
<br><br>
<tr align="left"><td></td>
<td><a href="../back/steamopenid.php"><img src="../images/steamlogin.png"></img></a></td></tr><br><br>
<tr align="left"><td>
SteamID:</td>
<td><input size=42 type="text" disabled="disabled" name="steamid" value=<?php echo $steamid; ?> ></td>
</tr><tr><td></td><td><span class="error"><?php echo $websiteErr;?></span></td>
</tr><br><br>
<tr align="left"><td>Comment:</td><td> <textarea name="comment" rows="5" cols="40"></textarea></td></tr>
<br><br>
<tr align="left"><td>Gender:</td><td>
<input type="radio" name="gender" value="female">Female
<input type="radio" name="gender" value="male">Male *</td></tr><tr><td></td><td>
<span class="error"> <?php echo $genderErr;?></span></td></tr>
<br><br><tr align="left"><td>
<input type="submit" name="submit" value="Submit"> </td></tr>
</form>
</table>
                 </div>   </div></div>

<?php include("footer.php");?>


</body>
</html>
