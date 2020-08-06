

<html>
<head>   <meta charset="utf-8">
		<title> Home Page</title>
		<link rel="stylesheet" type="text/css" href="stylesheet/home.css">
</head>
		<?php 
					if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]."</div>";
					}
					?>
		
		
		 <body background =back1.jpg>
<h1><center>Harcourt Butler Technical University <br>Kanpur</center></h1>
			<center><label><b>"Feel the significance of  fast downloading with this powerful Idea"</b></center>
			<center><label><h1><b>Parallel integration of File Storage </b></h1></center>
			
			<div id="pic"><center><img src="images/down.jpg" /></center></div>
           <form action="index.php" method="post">
                     <div id="loginbutton"><input type="submit"  value=" User Log-In"></div></form>
		    <form action="index2.php" method="post">
                    <div id="adminbutton"><input type="submit" value="Admin Log-In"></div></form>
           
			
             
        </body>
        </html>
		