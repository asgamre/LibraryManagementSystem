<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 

$username = $_SESSION['username'];
unset($_SESSION['isbn']);	
?> 
<html>
    <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>
<div class=" container">
    <form id ="contact"  action="SearchBooks.php" method="post" style="margin-top: 10px;">
    <h1 style="margin-top: 10px">Library Management System</h1>
    </form >
<form id ="contact"  action="SearchBooks.php" method="post" style="margin-top: -110px">
    <button type="submit" value="Search Books">Search Book</button>
</form >

<form id ="contact"  id ="contact"  action="Checkout.php" method="post" style="margin-top: -100px">
    <button type="submit" value="Checkout Book">Checkout Book</button>
</form>
<form id ="contact"  action="BorrowerMgmt.php" method="post" style="margin-top: -100px">
    <button type="submit" value="BorrowerMgmt">Borrower Management</button>
</form >

<form id ="contact"  action="Fines.php" method="post" style="margin-top: -100px">
    <button type="submit" value="Fines">Fines</button>
</form >

<form id ="contact"  action="Checkin.php" method="post"style="margin-top: -100px">
    <button type="submit" value="Check In">Check In</button>
</form >

<form id ="contact"  action="Login.php" method="post"style="margin-top: -100px">
    <button type="submit" value="Close">Close</button>
</form >
</div>
</body>
</html>