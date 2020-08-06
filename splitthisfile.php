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
	background-image: url(intro.jpg);
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

.login input[type=submit]{
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
<?php
if (!isset($_POST['submit']))
{
//form not submitted, display form
?>
<body>

  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div style="font-family: 'Agency FB'">Split<span>File</span></div>
		</div>
		<br>
		<form method="post">
		<div class="login">
				<input type="text" name="filenametosplit" placeholder="filename to split" size="50"><br><br>
				<input type="text" name="maxuploadlimit"  placeholder="maximum upload limit" size="10"><br>
				<input type="submit" name="submit" value="Split the file">
		</div>
		</form>

  <script src='jquery.js'></script>



<?php
}
else
{
//form submitted get the POST data
$file_name = trim($_POST['filenametosplit']);
$maximumuploadlimit = trim($_POST['maxuploadlimit']);
//compute the number of parts
$filesize = ((filesize($file_name))/1000);
$parts_num = ($filesize/$maximumuploadlimit);
$parts_num= floor($parts_num);
function splitthisfile($file_name,$parts_num)
{
$handle = fopen($file_name, 'rb') or die("error opening file");
$file_size =filesize($file_name);
$parts_size = floor($file_size/$parts_num);
$modulus=$file_size % $parts_num;
for($i=0;$i<$parts_num;$i++)
{
if($modulus!=0 & $i==$parts_num-1)
$parts[$i] = fread($handle,$parts_size+$modulus) or die("error reading file");
else
$parts[$i] = fread($handle,$parts_size) or die("error reading file");
}
//close file handle
fclose($handle) or die("error closing file handle");
//writing to splitted files
$nnnn = array("2k6l6m9o1u7f3k2i1y1e0m6r0q5d5m","0j5p8u5c0e4p5w7d5u3i6f9h2z2q8m","8j7n6e7l2c0d5t2x9f7p4c1o5m6q2z","9f0q4a7d6n8m8n5h8i0r8v4g4i1b8s","2s9h0h9y6l3z4f6g3f3c0n7k2t5l6z","0d0u8t9i2f3d9u7i2j1m6g8t5j9q6y","9h0y6h6p7t5v0f4z0v6v7e8u5i2r5x","5v1z9c2d2v4n6w5r8n1s0s2f9s1h7k","0n3c1a7q6j7l9r6g9m0m1y2y5q8z6q","2m3o0s1l4o9z1k3e5a2r1u0o3o8k7q");
for($i=0;$i<$parts_num;$i++)
{
$handle = fopen($nnnn[$i], 'wb') or die("error opening file for writing");
fwrite($handle,$parts[$i]) or die("error writing splited file");
}
//close file handle
fclose($handle) or die("error closing file handle");
return 'OK';
}
splitthisfile($file_name,$parts_num) or die('Error spliting file');
echo '<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div style="font-family: \'Agency FB\'">File<span>  Splitted Successfully</span>';

}
?>