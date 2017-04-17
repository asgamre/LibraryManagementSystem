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

if(isset($_POST['ssn']) && isset($_POST['address']) && isset($_POST['fname']) && isset($_POST['lname'])){
$ssn = $_POST['ssn'];  
$address = $_POST['address'];  
$fname = $_POST['fname'];  
$lname = $_POST['lname'];  
$phone = $_POST['phone'];
$sql_query1 = "Select ssn from Borrower where ssn LIKE '".$ssn."';";
$result1 = mysqli_query ($link, $sql_query1)  or die("Error executing query");
$query = "Insert into Borrower(ssn,fname,lname,address,phone) values('$ssn','$fname','$lname','$address','$phone')";
mysqli_query ($link, $query)  or die("Duplicate entry");
		
}


?>