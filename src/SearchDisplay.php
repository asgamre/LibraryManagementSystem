<?php
include 'dbinfo.php'; 
?>  
<?php

session_start(); 


$link = mysqli_connect($host,$user,$pass) or die( "Unable to connect");
mysqli_select_db($link, $database) or die( "Unable to select database");
$username = $_SESSION['username'];
if(isset($_POST['ISBN'])){
    $isbn = $_POST['univ'];  
    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors BA Where BA.ISBN = '$isbn' and A.author_id=BA.author_id and B.ISBN=BA.ISBN";
	   $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));  
		if($result1 == false)
		{
			echo 'The query by Title failed.';
			exit();
		}	
    
}
else if(isset($_POST['title']) && !isset($_POST['author'])){
    $title = $_POST['univ'];  
    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors as BA Where B.Title LIKE '%".$title."%' and BA.author_id=A.author_id and B.ISBN=BA.ISBN";
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
    
}
else if(isset($_POST['author']) && !isset($_POST['title'])){
    $author = $_POST['univ'];  
    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A,book_authors as BA Where A.name LIKE '".$author."%' and A.author_id=BA.author_id and B.ISBN=BA.ISBN";
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
}
//else if(isset($_POST['ISBN']) && isset($_POST['author'])){
//    $isbn = $_POST['univ'];  
//    $author = $_POST['univ'];   
//    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors as BA Where BA.ISBN = '$isbn' and A.name LIKE '".$author."%' and BA.author_id=A.author_id and B.ISBN=BA.ISBN";
//    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
//	if($result1 == false)
//	{
//		echo 'The query by ISBN failed.';
//		exit();
//	}
//}
else if(isset($_POST['title']) && isset($_POST['author'])){
    echo "Hata";
    $univ = $_POST['univ']; 
    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors as BA Where B.Title LIKE '%".$univ."%' and B.ISBN=BA.ISBN and BA.author_id=A.author_id UNION ALL Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors as BA Where A.name LIKE '".$univ."%' and BA.author_id=A.author_id and B.ISBN=BA.ISBN ;";
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
}
//else if(isset($_POST['ISBN']) && isset($_POST['title'])){
//     $isbn = $_POST['univ'];  
//    $title = $_POST['univ'];  
//    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors as BA Where B.Title LIKE '%".$title."%' and BA.ISBN = '$isbn' and BA.author_id=A.author_id and B.ISBN=BA.ISBN";
//    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
//	if($result1 == false)
//	{
//		echo 'The query by ISBN failed.';
//		exit();
//	}
//    
//}
else if(isset($_POST['ISBN']) && isset($_POST['author'])&& isset($_POST['title'])){
     $isbn = $_POST['ISBN'];  
    $title = $_POST['title'];  
    $auth = $_POST['author'];
    $sql_query1 = "Select B.ISBN, B.Title,A.NAME From book AS B, authors AS A, book_authors as BA Where B.Title LIKE '%".$title."%' and BA.ISBN = '$isbn' and A.name LIKE '".$author."%' and BA.author_id=A.author_id and B.ISBN=BA.ISBN";
    $result1 = mysqli_query ($link, $sql_query1)  or die(mysqli_error($link));	
	if($result1 == false)
	{
		echo 'The query by ISBN failed.';
		exit();
	}
    
}

?>
<html>
<body>    
<h1>Search results</h1>
<form action="" method="post">

<table border="1" style="width:100%">
  <tr>

    <th>ISBN</th>
    <th>Title of the book</th>
    <th>Authors</th>

  </tr>
  <?php while($row = mysqli_fetch_array($result1)){ 
	  
	$ISBN = $row['ISBN'];
	$Title = $row['Title'];
        $author = $row['NAME'];
  ?>
  <tr>
    <td><?php echo $ISBN; ?></td>
    <td><?php echo $Title; ?></td>
    <td><?php echo $author; ?></td>
  </tr>
<?php
}
?>
</table>
<input type="Submit" value="submit"/>
<input type="submit" value="Back" formaction="SearchBooks.php"/>
</form>

</form>
</body>
</html>