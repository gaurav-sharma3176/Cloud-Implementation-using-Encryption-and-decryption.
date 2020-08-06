<?php session_start();
if(isset($_POST["submit"])){
$email=$_POST["username"];
$password=$_POST["password"];

if($email!="" AND $password!=""){
	
$s="localhost";
$u="root";
$p="";
$db="cloud";
$conn=new mysqli($s,$u,$p,$db);
if($conn->connect_error){
die("connection failed : " .$conn->connect_error);
}
$sql="SELECT * FROM profile where email='$email' AND password='$password' ";
$rslt=$conn->query($sql);
if($rslt->num_rows>0){
while($row=$rslt->fetch_assoc()){ 
$a=$row["Name"];
$b=$row["SR"];
$c=$row["Email"];
$d=$row["Branch"];
$e=$row["ID"];
$_SESSION[User]= $a ;
$_SESSION[SR]=$b;
$_SESSION[Email]=$c ;
$_SESSION[Branch]=$d;
$_SESSION[ID]=$e;
header("Location:success.php"); 

	
	
}

}
	else { header( "Location:index.php?id=error&&v=Incorrect email/password. Please log in again or  sign up ");
}
$conn->close();
}
else {
header ("Location : index.php");
echo " please fill complete details before submission ";
}
}

?>
