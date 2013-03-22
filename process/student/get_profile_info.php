<?php
	include "includes/connect_db.php";
	
	/* get student profile information */
	
	$query="select * from student where username=\"".$_SESSION["username"]."\"";
	$found=mysql_query($query,$conn);
	$row=mysql_fetch_array($found);
	
	$fname=$row['firstname'];
	$mname=$row['middlename'];
	$lname=$row['lastname'];
	$full=$fname." ".$mname." ".$lname;
	$bdate = new DateTime($row['birthday']);
	$fbdate= $bdate->format('F d, Y');
	$hadd=$row['home_add'];
	$hadd_no=$row['home_add_no'];
	$cadd=$row['college_add'];
	$cadd_no=$row['college_add_no'];
	$sno=$row['student_no'];
	$eadd=$row['email_add'];
	$mno=$row['mobile_no'];
	
	mysql_close($conn);
?>