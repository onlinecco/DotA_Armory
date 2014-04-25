<?php include("../back/core.php");?>

<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script src="../css/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    
</head>
<body>
<?php include("header.php"); ?>
<div class="body" height=800>
<div class="content" height=800>
<div class="text" align="center" height=800>
<div id="wait2">Please be patient while the data is loading...<br></div>
<img id="wait" src="../images/loading2.gif"></img>
<div id="userinfo"><br><br></div>
<div id="userinfo2"><br><br></div>
<div id="chart_div" style="width: 900px; height: 500px;"></div>
<script language="javascript" charset="utf-8">
      google.load("visualization", "1", {packages:["corechart"]});
      function drawChart(data2) {
        var data = new google.visualization.DataTable();
	data.addColumn("string","Days");

	data.addColumn("number","Winrate");
	data.addRows(7);
	data.setCell(0,0,'Yesterday');
	data.setCell(0,1,data2[1][0]);
	data.setCell(1,0,'2 Days ago');
	data.setCell(1,1,data2[1][1]);
	data.setCell(2,0,'3 Days ago');
	data.setCell(2,1,data2[1][2]);

	data.setCell(3,0,'4 Days ago');
	data.setCell(3,1,data2[1][3]);

	data.setCell(4,0,'5 Days ago');
	data.setCell(4,1,data2[1][4]);
	data.setCell(5,0,'6 Days ago');
	data.setCell(5,1,data2[1][5]);
	data.setCell(6,0,'A week ago');
	data.setCell(6,1,data2[1][6]);
        
	var options = {
          title: 'Your winrate this week:',
	  backgroundColor: '#000000',
hAxis: { baselineColor: '#ffffff' },
vAxis: { baselineColor: '#ffffff'},
series: {0:{color:'red',lineWidth:7}},
legend:{textStyle:  {color:'red'}}
	 };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
	}
 
google.setOnLoadCallback(casd);
$("#wait").show(); 
function casd(){
<?php if(isset($_SESSION['isLogin']) && $_SESSION['isLogin']){?>
$.ajax({
                url: '../back/stats.php',
                type: 'POST',
                data:{},
                dataType: 'json',
//                timeout: 800000,
                error: function(data){
                        alert("Please try again later");
                },
                success: function(data){
			$("#wait").hide();
 
			$("#wait2").hide(); 
      			var elem = document.createElement("img");
			elem.src = data[0][1];
			document.getElementById("userinfo").appendChild(elem);
                        document.getElementById('userinfo').innerHTML += data[0][0];
			drawChart(data);

                }
});
$.ajax({
                url: '../back/morestats.php',
                type: 'POST',
                data:{},
                dataType: 'json',
//                timeout: 800000,
                error: function(data){
                        alert("Please try again later");
                },
                success: function(data){
			var index = 0;
			var ew = document.createElement("div");
			ew.innerHTML = "<h1>You have played "+data[11] + " games this week!<h1><br>";
			
			document.getElementById("userinfo2").appendChild(ew);
			for(var i =0;i<5;i++)
			{
				var hey = document.createElement("div");
				hey.className = "morestats";
				index = index + 2;
				hey.style.height = "115px";
				hey.style.width = "205px";
				hey.style.display = "inline-block";
				hey.style.margin = "30px";
				var p = index-1;
				var addon;
				if(p == 1) addon = "Highest GPM: ";
				if(p == 3) addon = "Most Kills: ";
				if(p == 5) addon = "Most Deaths: ";
				if(p == 7) addon = "Most Assists: ";
				if(p == 9) addon = "Longest Game Time: ";
				var hey2 = document.createElement("div");
				hey2.innerHTML = addon + data[p];
				hey2.style.marginTop = "45px";	
				hey.appendChild(hey2);

				hey.style.backgroundImage = 'url(http://media.steampowered.com/apps/dota2/images/heroes/'+ data[index] +'_lg.png)';
			document.getElementById("userinfo2").appendChild(hey);
			}
                }
});

<?php }else{ echo "$(\"#wait\").hide();
 
			$(\"#wait2\").hide();";?>

			document.getElementById("userinfo").innerHTML += "Please Login first.";
<?php }?>
}
</script>

<div id="hehe"></div>
</div>                    
</div>                    
</div>
<?php include("footer.php");?>
</body>
</html>
