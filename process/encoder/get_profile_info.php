<?php
	include "includes/connect_db.php";
	
	/* get student profile information */
	
	$query="select * from encoder where username=\"".$_SESSION["username"]."\"";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	$encoder_no=$row['encoder_no'];
	$firstname=$row['firstname'];
	$middlename=$row['middlename'];
	$lastname=$row['lastname'];
	
	mysql_close($conn);
?>