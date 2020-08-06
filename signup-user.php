<?php 
session_start();
if(isset($_POST["Submit"])){
$name=$_POST["Name"];
$City=$_POST["City"];
$Occupation=$_POST["Occupation"];
$email=$_POST["Email"];
$password=$_POST["Password"];
if($name!="" AND $City!="" AND $Occupation!="" AND $email!="" AND $password!=""){
	$s="localhost";
$u="root";
$p="";
$db="cloud";
$conn=new mysqli($s,$u,$p,$db);
if($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}
$sql="insert into profile ( Name , City , Occupation ,  Email, Password) 
VALUES ('$name', '$City', '$Occupation' , '$email', '$password' ) ";
$rslt=$conn->query($sql);
if($rslt===true){

	header("Location:index.php?id=success&v=you are signed up successfully");
	}
	else {
	header ("Location: index.php ? id=Error&v=sorry database error ..try again..." );
	 };
	
	
}
else{
 header( "Location: signup.php?id=error &v=Error:All fields mandatory");
 }
 
}
else
{ header("Location: index.php?id=error&v=Please login to your account");
}




?>