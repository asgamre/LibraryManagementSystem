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
    $isbn = $_POST['ISBN'];  
    $query1 = 'Update Book set availability=0 where isbn="'.$isbn.'"';
    $result1 = mysqli_query ($link, $query1)  or die(mysqli_error($link));  
    $query2 = 'Select due_date from book_loans where isbn="'.$isbn.'"';
    $result2 = mysqli_query ($link, $query2)  or die(mysqli_error($link)); 
    $row = mysqli_fetch_array($result2);
    $due_date= $row['due_date'];
    $today = date("Y-m-d");
    if($today<$due_date){
    $query3 = 'Update Book_loans set date_in=curdate() where isbn="'.$isbn.'"';
    $result3 = mysqli_query ($link, $query3)  or die(mysqli_error($link));
    if($result3 == true){
        echo "Availability Updated";
    }
    else{
        echo "Update failed";
    }
    }
    else{
        echo "Impose Fine";
        
    }
}
?>