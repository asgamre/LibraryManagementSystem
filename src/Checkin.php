
<html>
    <head>
 <link rel="stylesheet" type="text/css" href="css.css">    
 </head>
<body>
    <div class="container">
    <form id="contact"action="CheckInDisplay.php" method="post">
        <h1>Check In</h1>
<table>
    <tr>
    <td>Universal Search Field</td>
    <td><input type="text" name="univ" required/></td>
</tr>
<tr>
    <td>ISBN</td>
    <td><input type="checkbox" name="ISBN" value="ISBN" ><br/></td>
</tr>
<tr>
    <td>Card_id</td>
    <td><input type="checkbox" name="cardid" value="cardid"><br/></td>
</tr>
</table>
        <button type="submit" value="Confirm" style="margin-top: 10px">Confirm</button>
</form>
<form id="contact"  action="UserSummary.php" method="post" style="margin-top: -120px">
    <button id="contact-submit" type="Submit" value="Back" style="width:350px;">Back</button>
</form>
 </div>
</body>
</html>    