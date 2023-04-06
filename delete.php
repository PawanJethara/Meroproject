<?php  include'connection.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM studentd WHERE s_id=$id"); 
header('Refresh: 1; url=personaltable.php'); 
?>