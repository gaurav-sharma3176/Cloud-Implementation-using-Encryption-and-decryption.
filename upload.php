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
                   <b> Upload File:</b><br /> 
                    <br>
                    <input type="file" name="uploadedFile"> <br>
                    <input type="submit" value="upload File"  onclick= "display_alert() " name="submit">  
						
						
                </form><br><br><br>
				<h2><center>
				<hr >
<!-- <form action="addexec.php" method="post" enctype="multipart/form-data" name="addroom">
 Select Image: <br />
 <input type="file" name="image" class="ed"><br />
 Caption<br />
 <input name="caption" type="text" class="ed" id="brnu" />
 <br />
 <input type="submit" name="Submit" value="Upload" id="button1" />
 </form>
<br />    
-->
		
<?php
if(isset($_POST['submit']))
{
	$file_name=$_FILES["uploadedFile"]["name"];
	$tmp_name=$_FILES["uploadedFile"]["tmp_name"];
	$store="uploads1/".$file_name ;
	if(move_uploaded_file($tmp_name,$store))
	{
		$f_size=$_FILES["uploadedFile"]["size"];	
		echo "file has been uploaded and the size of the file is (in Bytes)";
		echo $f_size;
	}	
} 
 
							
				
?>    <center><br>  <a href="upload/notice.php">split the file </a> </br></center>
		
	</h2></center>
			<br><br>
			 <input type="submit" value="split the file"  onclick= "/upload/notice.php " name="submit">  
							
				
            </div></center></p>
			
           
		

	</div>
</body>
</html>
<?php } ?>