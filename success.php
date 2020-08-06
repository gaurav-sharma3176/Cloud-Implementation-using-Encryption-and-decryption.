<?php
session_start();
if(isset($_SESSION["User"])){ 
header("Refresh:3; URL=profile.php");
}
else {
 header("Location: index.php?");
}
?>
<!DOCTYPE html>
<html>
<head>   <meta charset="utf-8">
		<title> Success </title>
		<link rel="stylesheet" type="text/css" href="public/css/style.css"></head>
<body> 
	<div id="wrapper">
		<center><div id="success-info">
			<h2> You are Logged-in </h2>
			<h4>Redirecting to your profile.....</h4></center>
		</div>
		
	</div>
</body>
</html>