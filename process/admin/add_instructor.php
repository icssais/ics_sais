<?php
	session_start();
	
	require "../../includes/connect_db.php";
	
	$emp_no=$_POST['emp_no'];
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
		$_SESSION['message']='Username Already Taken.';
	}
	else if($pwd!=$retype_pwd){
		$error=true;
		$_SESSION['message']='Passwords did not match.';
	}
	else{
		//update instructor table	
		$query="update instructor set username='{$uname}' where emp_no='{$emp_no}'";
		mysql_query($query,$conn);
		
		//add to user table
		$query="insert into user values('{$uname}', '{$pwd}', 'Instructor', 1, 1)";
		$found=mysql_query($query,$conn);
		if($found){
			$_SESSION['message']='User Account Added.';
		}
	}
	
	mysql_close($conn);

	header("Location: ../../index.php?action=adduser");
?>