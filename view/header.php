<div class="header">
<?php if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == 1) echo "<div id=\"loginstatus\"><p>Hello! " . $_SESSION['username'] .  "! <a href=\"logout.php\">Log out</a></p></div>";?>
<a href="../index.php"><img class="logo" src="../images/logo.png"></img></a>
<ul>
				<li style="float:left;margin:0 0 0 100px">
					<a href="heroes.php"><span>H</span>eroes</a>
				</li>
				<li style="float:left;">
					<a href="items.php"><span>I</span>tems</a>
				</li>
				<li style="float:left;">
					<a href="players.php"><span>P</span>layers</a>
				</li>
				<li style="float:left;">
					<a href="matches.php"><span>M</span>atches</a>
				</li>
				<li style="float:right;margin: 0 100px 0 15px;">
					<a href="login.php"><span>L</span>ogin</a>
				</li>
<?php if(isset($_SESSION)&&$_SESSION['isLogin']==1) echo "<li style=\"float:right;\"><a href=\"profile.php\"><span>P</span>rofile</a></li>";?>
<?php if(!(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==1)) echo "<li style=\"float:right\"><a href=\"register.php\"><span>R</span>egsiter</a></li>";?> 
			</ul>
</div>
