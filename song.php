<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Login Form</title>

    <style>
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 100;
  src: local('Exo Thin'), local('Exo-Thin'), url(font/font11.woff2) format('woff2'), url(font/font12.woff) format('woff');
}
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 200;
  src: local('Exo ExtraLight'), local('Exo-ExtraLight'), url(font/font21.woff2) format('woff2'), url(font/font22) format('woff');
}
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 400;
  src: local('Exo Regular'), local('Exo-Regular'), url(font/font31.woff2) format('woff2'), url(font/font32.woff) format('woff');
}


body{
	margin: 0;
	padding: 0;
	background: #fff;

	color: #fff;
	font-family: 'Exo';
	font-size: 12px;
}

.body{
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	width: auto;
	height: auto;
	background-image: url(back1.jpg);
	background-size: cover;
	-webkit-filter: blur(5px);
	z-index: 0;
}

.grad{
	position: absolute;
	top: 0px;
	left: 0px;
	right: 0px;
	bottom: 0px;
	width: auto;
	height: auto;
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
	z-index: 1;
	opacity: 0.7;
}

.header{
	position: absolute;
	top: calc(50% - 35px);
	left: calc(50% - 255px);
	z-index: 2;
}

.header div{
	float: left;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 35px;
	font-weight: 200;
}

.header div span{
	color: #5379fa !important;
}

.login{
	position: absolute;
	top: calc(50% - 75px);
	left: calc(50% - 50px);
	height: 150px;
	width: 350px;
	padding: 10px;
	z-index: 2;
}

.login input[type=text]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
}

.login input[type=password]{
	width: 250px;
	height: 30px;
	background: transparent;
	border: 1px solid rgba(255,255,255,0.6);
	border-radius: 2px;
	color: #fff;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 4px;
	margin-top: 10px;
}

.login input[type=button]{
	width: 260px;
	height: 35px;
	background: #fff;
	border: 1px solid #fff;
	cursor: pointer;
	border-radius: 2px;
	color: #a18d6c;
	font-family: 'Exo', sans-serif;
	font-size: 16px;
	font-weight: 400;
	padding: 6px;
	margin-top: 10px;
}

.login input[type=button]:hover{
	opacity: 0.8;
}

.login input[type=button]:active{
	opacity: 0.6;
}

.login input[type=text]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
	outline: none;
	border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
	outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}
</style>

    <script src="js/prefixfree.min.js"></script>

</head>

<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<?php

if(!isset($_POST['user'])){			//check if the user has given the user details if not then it prints you can't access this file
	echo "<div style=\"font-family: 'Agency FB'\">Error!<span>Wrong Inputs</span></div>";
	exit;
} elseif($_POST['user']=='hbti'&&$_POST['pass']=='1234') { // if user has given username = username and password = pass the its correct and link will be provided
	echo "<div style=\"font-family: 'Agency FB'\">Login<span>Successful</span></div></div><br>
	<div class=\"login\">
				<input type='button' value=' Enter to the admin panel'  onclick=\"window.location='merge'\";><br> 
				<input type='button' value='split files' onclick=\"window.location='upload/notice.php'\"><br>
				<input type='button' value='Download File' onclick=\"window.location='download/'\"><br>
				
		</div>";
	
	
	exit;
	}
else { //if wrong username and password then this code will be executed
	echo "<div style=\"font-family: 'Agency FB'\">Error!<span>Wrong Inputs</span></div>";
	exit;
}


?>
			

  <script src='jquery.js'></script>

</body>

</html>

