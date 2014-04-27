<?php include("../back/core.php");?>
<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script src="../css/jquery-1.11.0.min.js"></script>
</head>
<body>
<?php include("header.php");?>
					<div class="body">
<div class="content">

<div class="text" align="center">

<img id="wait" src="../images/loading2.gif"></img>

<div id="hehe"></div>
<script language="javascript" charset="utf-8">
$("#wait").show(); 
<?php if(isset($_SESSION['isLogin'])&& $_SESSION['isLogin']) { ?>
$.ajax({
                url: '../back/recommendback.php',
                type: 'POST',
                data:{},
                dataType: 'json',
                error: function(data){
                        alert("Please try again later");
                },
                success: function(data){
			$("#wait").hide();
			var hahaha = "Here are some hero recommendations for you to try out based on the heroes you've played recently. Give them a go if you want to try something new! <br><br><br>";
			hahaha += "<table id='recommend'><tr><td algn='center'>Hero 1</td><td algn='center'>Hero 2</td><td algn='center'>Hero 3</td></tr>";
			hahaha += "<tr><td><img src=\"http://cdn.dota2.com/apps/dota2/images/heroes/" +data[3]+ "_vert.jpg \"></img></td><td><img src=\"http://cdn.dota2.com/apps/dota2/images/heroes/" +data[4]+ "_vert.jpg \"></img></td><td><img src=\"http://cdn.dota2.com/apps/dota2/images/heroes/" +data[5]+ "_vert.jpg \"></img></td></tr>";
            hahaha += "<tr><td>"+data[0]+"</td><td>"+data[1]+"</td><td>"+data[2]+"</td></tr>";


			hahaha += "</table>";
			document.getElementById('hehe').innerHTML += hahaha; 
                }
});


 <?php }else{ ?>

			document.getElementById('hehe').innerHTML += "Please login first!"; 
<?php } ?>

</script>

</div>
</div>
                    </div>
<?php include("footer.php");?>
</body>
</html>
