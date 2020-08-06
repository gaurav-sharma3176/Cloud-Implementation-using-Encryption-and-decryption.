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

		<p><center><a href="logoff.php"> Logoff</a>
		 <div id="signup-wrapper">
         <form action="" method="post" enctype="multipart/form-data">
               		
					
<?php
if(isset($_POST['submit']))
{
	$file_name=$_FILES["image"]["name"];
	$tmp_name=$_FILES["image"]["tmp_name"];
	$store="photos/".$file_name ;
	if(move_uploaded_file($tmp_name,$store))
	{
		$f_size=$_FILES["image"]["size"];	
		echo "file has been uploaded and the size of the file is (in Bytes)";
		echo $f_size;
	}	
} </form>
 <br><br><br> 		
				<h2><center> 
	
  <center><br>  <a href="upload/notice.php">split the file </a> </br></center>
		
	</h2></center>
							
				
            </div></center></p>
	</div>
</body>
</html>
<?php } ?>