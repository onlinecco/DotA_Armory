<?php include("../back/register.php"); ?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>register</title>
</head>

<body style="background-color:black;color:white;">

<table>
<form style="padding: 0px 0px 0px 0px;margin:0px;border: dashed 1px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<tr align="left"><td>Name:</td><td> <input size=42 type="text" name="name">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $nameErr;?></span></td></tr>
<br><br>
<tr align="left"><td>E-mail:</td>
<td><input size=42 type="text" name="email">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $emailErr;?></span></td></tr>
<br><br>
<tr align="left"><td>
SteamID:</td>
<td><input size=42 type="text" name="steamid"></td>
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
</body>
</html>
