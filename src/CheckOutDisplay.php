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
$isbn = $_POST['isbn'];  
$card = $_POST['card'];
$query1 = 'select availability from book where isbn = "'.$isbn.'" ';
$query2 = 'select count(loan_id) as cardcount from book_loans where card_id = "'.$card.'"';
$query3 = 'select paid from fines F, book_loans B where F.loan_id = B.loan_id and B.card_id="'.$card.'"';
$result1 = mysqli_query ($link, $query1)  or die("No Availability");
$result2 = mysqli_query ($link, $query2)  or die("Nothing Count");
$result3 = mysqli_query ($link, $query3)  or die("Bas kar");

if($result1==true && $result2==true){
$row1 = mysqli_fetch_array($result1);
$avail = $row1['availability'];
$row2 = mysqli_fetch_array($result2);
$cardcount = $row2['cardcount'];
$row3 = mysqli_fetch_array($result3);
$fine = $row3['paid'];
if ($cardcount < 3){
    if($fine != "No"){
    if($avail ==0){
        echo "Available!<br/>";
        $query="Insert into book_loans(isbn,card_id,date_out,due_date,date_in) values ('$isbn','$card',curdate(),DATE_ADD(curdate(), INTERVAL 14 DAY),'NULL')";
        $result = mysqli_query($link, $query)  or die("Not inserted");
        if($result == true){
            $update = "Update book set availability=1 where isbn ='".$isbn."' ";
            $updateresult = mysqli_query($link, $update);
            if($updateresult ==true){
                echo "availability updated<br/>";
            }
        }
    }
    else{
        echo "Not Available<br/>";
    }
}
    else{
        echo "Fine Not paid bro<br/>";
    }
}
    else{
        echo "Limit exceeded!<br/>";
    }
}

$finequery = 'select loan_id,isbn,date_out, due_date from book_loans where card_id="'.$card.'" ';
$resultfine = mysqli_query ($link, $finequery)  or die("Failure");
$rowdateout = mysqli_fetch_array($resultfine);
$loan_id = $rowdateout['loan_id'];
$isbn = $rowdateout['isbn'];
$date_out = $rowdateout['date_out'];
$due_date = $rowdateout['due_date'];
$today = date("Y-m-d");
if($today>$due_date){
    echo "Book '".$isbn."' is due<br/>";
    $fineinsert = "Insert into fines values('$loan_id',0.25,'No') ";
}
else{
    echo "book '".$isbn."' is not due<br/>";
}

?>