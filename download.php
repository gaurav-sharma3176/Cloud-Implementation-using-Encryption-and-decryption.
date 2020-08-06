<?php
session_start();
if(isset($_SESSION["User"])){ 
?>
<head> 
	<meta charset="utf-8">

</head>
<?php
$s="localhost";
$u="root";
$p="";
$db="cloud";
$a=$_SESSION['Email'] ; 
$b=$_SESSION['City'];
$conn=new mysqli($s,$u,$p,$db);
if($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}
$sql="SELECT * FROM profile where Email='$a' AND City='$b' ";
$rslt=$conn->query($sql);
if($rslt->num_rows>0){
while($row=$rslt->fetch_assoc()){
				$x=$row["file_name"] ; 
				
				$a= $_SERVER['SCRIPT_FILENAME'];
				$b=$_SERVER['PHP_SELF'] ;
		 $file_url =$row["file_path"];  
		header('Content-Type: application/octet-stream');  
		header("Content-Transfer-Encoding: utf-8");   
		header("Content-disposition: attachment; filename=\"" . basename($file_url) . "\"");   
		readfile($file_url);
		echo "downloaded successfully" ;  				
				 
				}   }
}?>