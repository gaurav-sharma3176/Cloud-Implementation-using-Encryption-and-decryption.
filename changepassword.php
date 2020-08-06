
<html>
	<head>
	<meta charset="UTF-8"/>
	<title > New password </title>
	<link rel="stylesheet" type="text/css" href="stylesheet/style.css">
	</head>

	<body>
	<div id=wrapper>
		<div id="header">
			<h2><img src="images/login.jpg"  > </h2>
			<h1><center>Parallel integration of file storage</center></h1><br><br><br><br><br><br><br>
			<img id="hbti" src="images/hbti.jpg" />
		</div>
		<?php 
					if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]." </div>";
					}
					?>
		<div id="signup-wrapper">
					<h2>change password!</h2>
					<form method="post" action="changepassword-user.php">
					<input type="text" name="Email" placeholder="Email id."> <br>
					<input type="text" name="Name" placeholder="Name"><br>
					<input type="text" name="City" placeholder="City"><br>
					<input type="password" name="new_password" placeholder=" new password"><br>
					<input type="password" name="confirm_password" placeholder="Re-Enter new password"><br>
					<button type="submit" name="submit" value="ok" >Change password</button>
					</form>
					<div id="signup-info">
				 <a href="index.php">Login</a>
			</div>
		</div>
	</div>
	</body>
	</html>