
<!DOCTYPE html>
<html lang="en-US">
<head>   

<meta charset="utf-8">
		<title> Log-In </title>
		<link rel="stylesheet" type="text/css" href="stylesheet/style.css"></head>
		
		 <body> <div id=time><?php 
		   date_default_timezone_set("Asia/Kolkata");
		   echo date('h:i A d/m/y');
		   ?></div> 
		   <div id="label1">
			<div id=line><h1><center><u>parallel integration of file storage</u></center></h1>
			<img src="images/logo2.jpg" > </h2></div>
			<br>
            <div id="container">
			
                <form action="authorization.php" method="post">
                   
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">
                    <div id="lower"><br>
                        <a href="changepassword.php"> Forgotten password?</a>
						<input type="submit"  name="submit" value="Login">
                    </div>
                </form>
            </div>
			
             <div id="signup-info">
				Don't have  an account ? <a href="signup.php">Signup </a>
			</div>
			
        </body>
        </html>
		