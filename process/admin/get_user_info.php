<?php
	include "includes/connect_db.php";
	
	/* get user profile information */
	
	$query="select * from admin where username=\"".$_SESSION["username"]."\"";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	$name=$row['name'];
	$empno=$row['emp_no'];
	$username=$row['username'];
	$eadd=$row['email_address'];
	
	mysql_close($conn);
?>