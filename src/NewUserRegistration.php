<?php
include 'dbinfo.php'; 
?>  

<?php
session_start(); 
$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['username']) and isset($_POST['password']) and isset($_POST['confirmpassword']))  {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmpassword = $_POST['confirmpassword'];
	
	$_SESSION['username']=$username;
	$_SESSION['password']=$password;
	$_SESSION['confirmpassword']=$confirmpassword;
	
	if($password == $confirmpassword) {
		$insertStatement = "INSERT INTO user (Username, Password) VALUES ('$username', '$password')";
		$result = mysqli_query ($link, $insertStatement)  or die(mysqli_error($link)); 
		if($result == false) {
			echo 'The query failed.';
			exit();
		}
	} else {
		echo 'password not consistent';
	}
}
?>

<html>
    <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>
<div class="container">
<form action="" method="post" id="contact">
    <h1>New User Registration</h1>
<table>
<tr>
    <td>Username</td>
    <td><input type="text" name="username" required/></td>
</tr>
<tr>
    <td>Password</td>
    <td><input type="text" name="password" required/></td>
</tr>

<tr>
    <td>Confirm Password</td>
    <td><input type="text" name="confirmpassword" required/></td>
</tr>
</table>

    <button id="contact-submit" type="submit" value="Register">Register</button>
</form>

    <form id="contact" action="UserSummary.php" method="post"style="margin-top: -140px">
        <button id="contact" type="submit" value="Back" formaction="UserSummary.php" style="width:340px;">Back</button>
</form>
</div>
</body>
</html>