<html>
<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 

$username = $_SESSION['username'];
?> 
    <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>
    <div class=" container">

        <form id ="contact" action="SearchDisplay.php" method="post">
    <h1>SearchBooks</h1>
<table>
    <tr>
    <td>Universal Search Field</td>
    <td><input type="text" name="univ"/></td>
</tr>
<tr> 
    <td>ISBN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="checkbox" name="ISBN" value="ISBN" required><br/></td>
</tr>
<tr><td>
Author&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="checkbox" name="author" value="author" required><br/></td>
</tr>
<tr>  
    <td>Title&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td><input type="checkbox" name="title" value="title" required><br/></td>
</tr>
<!--<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"/></td>
</tr>

<tr>
    <td>Title</td>
    <td><input type="text" name="title"/></td>
</tr>


<tr>
    <td>Author</td>
    <td><input type="text" name="author"/></td>
</tr>-->

</table>
<button formaction="HoldRequestforaBook.php" type="submit" name="submit" value="Search">Submit</button>
</form>
        <form id="contact"  action="UserSummary.php" method="post" style="margin-top: -120px">
            <button id="contact-submit" type="Submit" value="Back" style="width:350px;">Back</button>
</form>

    </div>
</body>
</html>