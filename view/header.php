<script src="../css/jquery-1.11.0.min.js"></script>
<script>
$(document).ready(function () {
  var top = $('#comment').offset().top - parseFloat($('#comment').css('marginTop').replace(/auto/, 0));
  $(window).scroll(function (event) {
    // what the y position of the scroll is
    var y = $(this).scrollTop();

    // whether that's below the form
    if (y >= top) {
      // if so, ad the fixed class
      $('#comment').addClass('fixed');
    } else {
      // otherwise remove it
      $('#comment').removeClass('fixed');
    }
  });
});
</script>
<style>
/* required to avoid jumping */
#commentWrapper {
top: 250px;  
position: absolute;
  margin-left: 35px;
  width: 140px;
height: 280px;
}

#comment {
  position: absolute;
  top: 0;
  /* just used to show how to include the margin in the effect */
  margin-top: 20px;
  border-top: 3px solid purple;
  padding-top: 5px;
  background-color: white;
 z-index: 1100;
color: black;
}

#comment.fixed {
  position: fixed;
 width:140px;
  top: 0;
}
#messages{
padding: 5px;
height: 100px;
border-bottom: 2px solid black;
}
#msend{
padding-right:10px;
display: inline-block;
height: 15px;
width:7px;
background-image: url('../images/chat2.png');
}
#input{
	padding-top: 5px;

	padding-bottom: 2px;
}
#message{
display: inline-block;
}
</style>



<div id="commentWrapper">
  <div id="comment">
	<div id="messages">
	Alice: This website is fantastic!
	</div>
	<div id="input">
	<input id="message" size="15" type="text" name="lastname">
	<div id="msend"></div>
	</div>
  </div>

</div>
<div class="header">
<?php if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] == 1 && !isset($no)) echo "<div id=\"loginstatus\"><p>Hello! " . $_SESSION['username'] .  "! <a href=\"logout.php\">Log out</a></p></div>";?>
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
					<a href="rank.php"><span>R</span>ank</a>
				</li>
				<li style="float:left;">
					<a href="stats.php"><span>S</span>tats</a>
				</li>
				<li style="float:left;">
					<a href="comp.php"><span>C</span>ompetition</a>
				</li>
				<li style="float:right;margin: 0 100px 0 15px;">
					<a href="login.php"><span>L</span>ogin</a>
				</li>
<?php if(isset($_SESSION)&&$_SESSION['isLogin']==1) echo "<li style=\"float:right;\"><a href=\"profile.php\"><span>P</span>rofile</a></li>";?>
<?php if(!(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']==1)) echo "<li style=\"float:right\"><a href=\"register.php\"><span>R</span>egsiter</a></li>";?> 
			</ul>
</div>
