<?php
session_start();
if(isset($_SESSION["User"])){ 
?>

<html>
<head>   <meta charset="utf-8">
		<title> <?php echo $_SESSION["User"];?> </title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css"></head>
<body> 
	<div id="wrapper">
		<div id="header">
			<h2><img src="images/login.jpg"  > </h2>
			<h1> parallel integration of file storage</h1><br><br><br><br><br><br><br>
			
			<img id="hbti" src="images/hbti.jpg" />
			
		</div>

		<p><center><a href="profile.php"> Go Back</a>
		 <div id="signup-wrapper">
                <h2> Hello.. <?php echo  $_SESSION["User"] ; ?></h2><br><br>
				<h3>Now you are authorized to share your files on the Cloud</h3><br><br>
		<h2>  Your Email : <?php echo $_SESSION["Email"]; ?> </h2><br><br>
		<a href="logoff.php"> Logoff</a>
            </div></center></p>
			
  </div>
  </body>
  </html>
<?php } ?>