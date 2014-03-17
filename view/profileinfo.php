<table align="center">
<form style="padding: 0px 0px 0px 0px;margin:0px;border: dashed 1px;" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<tr align="left"><td>New username:</td><td> <input size=42 type="text" name="username">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $unErr;?></span></td></tr>
<br><br>
<tr align="left"><td>New email:</td><td> <input size=42 type="text" name="email">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $emailErr;?></span></td></tr>
<br><br>
<tr align="left"><td>Old password:</td>
<td><input size=42 type="password" name="opassword">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $opwErr;?></span></td></tr>
<br><br>
<tr align="left"><td>New password:</td>
<td><input size=42 type="password" name="password">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $pwErr;?></span></td></tr>
<br><br>
<tr align="left"><td></td>
<td><input size=42 type="password" name="password2">*</td>
</tr><tr><td></td><td><span class="error"> <?php echo $pw2Err;?></span></td></tr>
<br><br>
<br><br><tr align="left"><td>
<input type="submit" name="submit" value="Submit"> </td></tr>
<tr align="left"><td>
<input type="submit" name="delete" value="Delete this account!">
</td></tr>

</form>

</table>
