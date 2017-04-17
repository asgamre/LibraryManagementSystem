<?php
include 'dbinfo.php'; 
?> 
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start(); 


$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");

if(isset($_POST['ISBN'])){
    $univ = $_POST['univ']; 
    $sql_query1 = "Select ISBN, Card_id From BOOK_LOANS Where ISBN LIKE '".$univ."%'";
	
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by ISBN failed.';
			exit();
		}
}
if(isset($_POST['cardid'])){
    $univ = $_POST['univ'];  
    $sql_query1 = "Select ISBN, Card_id From BOOK_LOANS Where Card_id LIKE '".$univ."%'";
	 //Run our sql query
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Card ID failed.';
			exit();
		}
}

?>
<html>
    <form action="UserSummary.php" method="post">
<input type="submit" value="Back"/>
</form>
    <form action="PostCheckin.php" method="post">

<table border="1" style="width:100%">
  <tr>
	<th>Select</th>
    <th>ISBN</th>
    <th>Title of the book</th>

  </tr>
  <?php while($row = mysqli_fetch_array($result1)){ 
	  
	$ISBN = $row['ISBN'];
	$Card_id = $row['Card_id'];
  ?>
  <tr>
    <td><input type="radio" name="ISBN" value="<?php echo $ISBN; ?>" required></td>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Card_id; ?></td>
  </tr>
<?php
}
?>
</table>
<input type="Submit" value="Check In" />
</form>

</html>    