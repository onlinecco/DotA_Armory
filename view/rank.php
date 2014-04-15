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
<script language="javascript" charset="utf-8">
$("#wait").show(); 
$.ajax({
                url: '../back/rank.php',
                type: 'POST',
                data:{},
                dataType: 'json',
                error: function(data){
                        alert("Please try again later");
                },
                success: function(data){
			$("#wait").hide();
			var hahaha = "<table id='rank'><tr><td>Rank</td><td>Player</td><td>Winrate</td></tr>";
			for(var i = 0;i<data.length;i++)
			{
				var i1= i+1;
                            hahaha += "<tr><td>"+i1+"</td><td><a href=\"steam://friends/add/"+data[data.length-i-1][2]+ "\"><div class=\"userpro\"><img src=\"" +data[data.length-i-1][1]+  "\"></img>" +data[data.length-i-1][0]+  "</div></td><td>" + data[data.length-1-i][3]+"</td></tr></a>";
                        }

			hahaha += "</table>";
			document.getElementById('hehe').innerHTML += hahaha; 
                }
});


 

</script>
<div id="hehe"></div>

</div>
</div>
                    </div>
<?php include("footer.php");?>
</body>
</html>
