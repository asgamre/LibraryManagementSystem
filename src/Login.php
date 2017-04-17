<?php
include 'dbinfo.php'; 
?>  

<html>
    <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>

<?php

session_start(); 

if(isset($_POST['username']) and isset($_POST['password']))  { 
	$username = $_POST['username']; 
	$password = $_POST['password']; 
	

$_SESSION['username']=$username;



$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
           $sql_query = "Select Username From user";
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}
			if(mysqli_num_rows($result) == 1){ 
			
				header('Location: AdminSummary.php');
			
			}
			
           $sql_query = "Select Username From user Where Username = '$username' AND Password = '$password'";  

            
           $result = mysqli_query ($link, $sql_query)  or die(mysqli_error($link));  
			if($result == false)
				{
				echo 'The query failed.';
				exit();
			}

			
			if(mysqli_num_rows($result) == 1){ 
				header('Location: UserSummary.php');
			   
			}else{ 
			$err = 'Incorrect username or password' ; 
			} 
			
			echo "$err";
    } 
	
?>	
<div class=" container">
    <form id ="contact"  action="" method="post" align="center">
<h1>Login</h1>
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="text" name="password" required/></td>
</tr>
</table>

<button type="Submit" id="contact-submit" value="Login">Login</button>
    </form>
    <form id="contact"  action="NewUserRegistration.php" method="post" style="margin-top: -120px">
        <button type="Submit" value="Create Account" style="width:350px;">Create Account</button>
</form>
</div>

</body>
</html>