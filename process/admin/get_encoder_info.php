<?php
	require "includes/connect_db.php";
	
	/* get instructor profile information */

	$user = $_GET['username'];
	
	$query="select * from encoder where username='$user'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	$name=$row["name"];
	$encoder_no=$row["encoder_no"];
	
	mysql_close($conn);
?>