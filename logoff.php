<?php
session_start();
if(isset($_SESSION["User"])){ 
unset($_SESSION["User"]);
header("Location:logoff-success.php");
}
else {
 header("Location: index.php");
}
?>