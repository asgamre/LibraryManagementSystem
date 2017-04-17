
<html>
    <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>
    <div class=" container">
    
    <form id ="contact" action="BorrowerMgmtDisplay.php" method="post">
<table>
<tr>
    <td>SSN</td>
    <td><input type="text" name="ssn" required/></td>
</tr>
<tr>
    <td>Address</td>
    <td><textarea rows="4" cols="50" name="address" ></textarea></td>
</tr>
<tr>
    <td>First Name</td>
    <td><input type="text" name="fname" required/></td>
</tr>
<tr>
    <td>Last Name</td>
    <td><input type="text" name="lname" required/></td>
</tr>
<tr>
    <td>Phone</td>
    <td><input type="text" name="phone" required/></td>
</tr>
</table>
        <button id="contact-submit" type="submit" value="Confirm" formaction="BorrowerMgmtDisplay.php">Confirm</button>
</form>
        <form id="contact"  action="UserSummary.php" method="post" style="margin-top: -120px">
 <button id="contact-submit" type="submit" value="Back" formaction="UserSummary.php" style="width:350px;">Back</button>
        </form>
    </div>
</body>
</html>    