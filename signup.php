
<html>
<head>   
		<title> Sign-up page </title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css"></head>
<body>  
	<div id="wrapper">
			 
		<div id="header"> <div id=time><?php 
		   date_default_timezone_set("Asia/Kolkata");
		   echo date('h:i A d/m/y');
		   ?></div>
			<h2><img src="images/login.jpg"  > </h2>
			<h1><center>Parallel integration of file storage</center></h1>
			<img id="hbti" src="images/hbti.jpg" />
		
				<?php 
					if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]." </div>";
					}
					?>
					
					<br><br>
			<div id="signup-wrapper">
					<center><h3> Sign-up </h3></center>
					<form method="post" action="signup-user.php">
					<input type="text" name="Name" placeholder="Full name"><br>
					<input type="text" name="City" placeholder="City"><br>
					<input type="text" name="Occupation" placeholder="Occupation"><br>
					<input type="text" name="Email" placeholder="email"> <br>
					<input type="password" name="Password" placeholder=" set password"><br>
					<button type="submit" name="Submit" value="ok" >Sign-up</button>
					</form>
					<div id="signup-info"><br><br>
				Please login <a href="index.php">here </a>
			</div>
		    
			</div>
			 
				
	</div>
</body>
</html>