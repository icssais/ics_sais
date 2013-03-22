<?php
	session_start();
	
	require "../../includes/connect_db.php";
	
	$student_no=$_POST['student_no'];
	$email_add=$_POST['email'];
	$reenter_email=$_POST['email2'];
	$uname=$_POST['uname'];
	$pwd=$_POST['pwd'];
	$retype_pwd=$_POST['pwd2'];
	
	//error checking
	$query="SELECT * from user WHERE username='$uname'";
	$found=mysql_query($query, $conn);
	$row=mysql_fetch_array($found);

	$error=false;
	
	if($row!=0){
		$error=true;
		$_SESSION['message']='Username already taken.';
	}
	else if($email_add!=$reenter_email){
		$error=true;
		$_SESSION['message']='Email addresses did not match.';
	}
	else if($pwd!=$retype_pwd){
		$error=true;
		$_SESSION['message']='Passwords did not match.';
	}
	else{
		//update student table	
		$query="update student set email_add='{$email_add}', username='{$uname}' where student_no='{$student_no}'";
		mysql_query($query,$conn);
		
		//add to user table
		$query="insert into user values('{$uname}', '{$pwd}', 'Student', 0, 0)";
		$found=mysql_query($query,$conn);
		if($found){
			$_SESSION['message']='User Account Added.';
		}
	}
	
	mysql_close($conn);

	header("Location: ../../index.php?action=adduser");
?>