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
$card = $_POST['card'];
$query = 'select F.loan_id,F.fine_amt,F.paid from FINES F, Book_loans B where B.card_id = "'.$card.'" and F.loan_id=B.loan_id';  
$result = mysqli_query ($link, $query)  or die("No fines");
if($result == true){
$row = mysqli_fetch_array($result);
$paid = $row['paid'];
if($paid == 'No'){
    echo "Fine not paid!";
}
//else if($paid==NULL){
//    echo "No Fine";
//}
}
else{
    echo "No Fine Info Found";
    
}
?>
<html>
<body>
<table border="1" style="width:100%">
  <tr>
    <th>Loan ID</th>
    <th>Fine Amount</th>
    <th>Paid</th>

  </tr>
  <?php while($rows = mysqli_fetch_array($result)){ 
	$loan_id = $rows['loan_id'];
	$fine_amt = $rows['fine_amt'];
        $paid = $rows['paid'];
        
  ?>
  <tr>
    <td><?php echo $loan_id; ?>1</td>
    <td><?php echo $fine_amt; ?></td>
    <td><?php echo $paid; ?></td>
  </tr>
<?php
}
?>
</table>
    