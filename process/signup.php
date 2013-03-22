<?php
	require "../includes/connect_db.php";
	
	$student_no=$_POST['student_no'];
	$email_add=$_POST['email'];
	$reenter_email=$_POST['reenter_email'];
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$retype_pwd=$_POST['retype_pwd'];
	
	//update student table	
	$query="update student set email_add='{$email_add}', username='{$uname}' where student_no='{$student_no}'";
	mysql_query($query,$conn);
	
	//add to user table
	$query="insert into user values('{$uname}', '{$pwd}', 'Student', 0, 0)";
	mysql_query($query,$conn);

	mysql_close($conn);
	
	header("Location: ../src/login.php");
?>