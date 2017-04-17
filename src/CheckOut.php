
<html>
        <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>
    <div class=" container">
    <form id ="contact" action="CheckOutDisplay.php" method="post">
        <h1>Check Out</h1>
<table>
<tr>
    <td>ISBN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><input type="text" name="isbn" required/></td>
</tr>
<tr>
    <td>Card_id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><input type="text" name="card" required/></td>
</tr>
</table>
<button formaction="CheckOutDisplay.php" type="submit" name="submit" value="Search">Confirm</button>
</form>
        <form id="contact"  action="UserSummary.php" method="post" style="margin-top: -120px">
            <button id="contact-submit" type="Submit" value="Back" style="width:350px;">Back</button>
</form>
    </div>
</body>
</html>    