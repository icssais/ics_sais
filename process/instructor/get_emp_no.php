<?php
	require "includes/connect_db.php";
	
	$query="select emp_no from instructor where username='{$_SESSION["username"]}'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$emp_no=$row["emp_no"];
	mysql_close($conn);
	
?>