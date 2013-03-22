<?php
	require "includes/connect_db.php";
	
	$query="select student_no from student where username='{$_SESSION["username"]}'";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	$student_no=$row["student_no"];
	mysql_close($conn);
	
?>