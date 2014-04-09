<?php include("../back/core.php");?>

<html>
<head>
<meta charset="UTF-8">
<title>DotA 2 Armory</title>
<link rel="stylesheet" href="../css/style.css" type="text/css">
<script src="../css/jquery-1.11.0.min.js"></script>
</head>
<body>
<?php include("header.php"); ?>
<div class="body" height=800>
<div class="content" height=800>

<div class="text" align="center" height=800>
<img id="wait" src="../images/loading2.gif"></img>
<script language="javascript" charset="utf-8">
$("#wait").show(); 
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
                        document.getElementById('hehe').innerHTML += "Generated:<br>";
        
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
