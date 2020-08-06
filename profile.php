<?php
session_start();
if(isset($_SESSION["User"])){ 
?>
<!DOCTYPE html>
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

		<div  id="content" >
				<?php if(isset($_GET["id"]))
					{ echo "<div id=".$_GET["id"].">".$_GET["v"]."</div>";
					}?>
					
					
		<center><h2>  <?php echo  $_SESSION["User"] ; ?> ....Now you are ready to use this tool
		</h2></center>
		
		<br><br><br>
		<a href="about.php">About Yourself</a><br><br><br>
		<a href='upload.php' > Upload your files </a><br><br>  
		 <a href="changepassword.php"> change password </a><br><br>
		 <a href="logoff.php"> Logoff</a>
		<?php $s="localhost";
$u="root";
$p="";
$db="cloud";
$a=$_SESSION['Email'] ; 
$b=$_SESSION['SR'];
$conn=new mysqli($s,$u,$p,$db);
if($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}

$sql="SELECT * FROM profile where Email='$a' AND City='$b' ";
$rslt=$conn->query($sql);
if ($rslt->num_rows>0){
while($row=$rslt->fetch_assoc()){
				$x=$row["file_name"] ; 
				$y=$row["file_path"];
				 if ($y==null ) {   ?> 
					
						<a href='upload.php' > Upload your files . </a>  
		<?php } else { ?>
		<h2>File : <?php echo $x ; ?> </h2>
		<a href="download.php" >Download </a><br/>
		<a href="upload.php" >Upload  </a> <?php  } } } ?>
		
		</div>
	</div>
</body>
</html>
<?php  } else { 
 header("Location:index.php");
 }
 ?>