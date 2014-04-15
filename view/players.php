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
<div class="text" align="center" id="hehe">

<img id="wait" src="../images/loading2.gif"></img>
<script language="javascript" charset="utf-8">
$("#wait").show(); 
$.ajax({
		url: '../back/players.php',
		type: 'POST',
		data:{},
		dataType: 'json',
		error: function(data){
			alert("Please try again later");
		},
		success: function(data){
$("#wait").hide();
if(jQuery.isEmptyObject(data)) document.getElementById('hehe').innerHTML += "Everyone is offline!<br>";
			else
			{
			document.getElementById('hehe').innerHTML += "In-game Users:<br>";
			for(var i = 0;i<data[0].length;i++)
					document.getElementById('hehe').innerHTML += "<a href=\"steam://friends/add/" + data[0][i][2] +"\"> <div class=\"userpro\"><img src=\"" + data[0][i][1] +"\"></img>"+data[0][i][0]+ "</div></a>";
			document.getElementById('hehe').innerHTML += "<br><br><br>Online Users:<br>";
			for(var i = 0;i<data[1].length;i++)
					document.getElementById('hehe').innerHTML += "<a href=\"steam://friends/add/"+data[1][i][2]+ "\"> <div class=\"userpro\"><img src=\"" +data[1][i][1]+  "\"></img>" +data[1][i][0]+  "</div></a>";
			}
		}
});


 

</script>

</div>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
