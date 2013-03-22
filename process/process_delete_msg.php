<?php
	include "../includes/connect_db.php";
	
	$id=$_GET['id'];
	
	$query="DELETE FROM inbox WHERE msgID={$id}";
	$found=mysql_query($query,$conn);
	
	header("Location: ../index.php?action=inbox");
	
	
	mysql_close($conn);
?>