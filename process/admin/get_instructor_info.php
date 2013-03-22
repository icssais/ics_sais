<?php
	require "includes/connect_db.php";
	
	/* get instructor profile information */
	
	$user = $_GET['username'];
	
	$query="select * from instructor where username='$user'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	$name=$row["name"];
	$emp_no=$row["emp_no"];
	$designation=$row["designation"];
	$rank=$row["rank"];
	$fac_room=$row["faculty_room"];	
	$mobile_no=$row["mobile_no"];
	
	mysql_close($conn);
?>